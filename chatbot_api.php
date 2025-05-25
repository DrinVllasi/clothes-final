<?php
header('Content-Type: application/json');

$categories = [
    'men' => 'clothes/mens',
    'women' => 'clothes/womens',
    'unisex' => 'clothes/mens',
];

// Define item keywords you want to support (expand as needed)
$itemKeywords = ['hoodie', 'jeans', 'shirt', 'skirt', 'shorts', 'longsleeve', 'buttonup', 'cargo', 'baggy','bag','bootcut','bracelet','earring','flare','necklace','ring','shoes','jorts','belt','jacket','slim','straight'];

// Read input message and lowercase
$input = json_decode(file_get_contents('php://input'), true);
$message = strtolower(trim($input['message'] ?? ''));

// Conversational triggers

// Detect category
$category = null;
foreach (['women', 'unisex', 'men'] as $cat) {
    if (strpos($message, $cat) !== false) {
        $category = $cat;
        break;
    }
}

if (!$category) {
    echo json_encode([
        'response' => 'Please specify a category like men, women, or unisex for suggestions.',
        'images' => []  
    ]);
    exit;
}

// Detect item keyword if any, considering plural form
$item = null;
foreach ($itemKeywords as $keyword) {
    if (strpos($message, $keyword) !== false || strpos($message, $keyword . 's') !== false) {
        $item = $keyword;
        break;
    }
}

// Base folder path
$folderPath = __DIR__ . '/' . $categories[$category];

// Get all image files in the folder
$imageFiles = glob($folderPath . '/*.{png,PNG}', GLOB_BRACE);

if (!$imageFiles) {
    echo json_encode([
        'response' => "Sorry, no images found for category '$category'.",
        'images' => []
    ]);
    exit;
}

// Filter images by item keyword in filename if present
if ($item) {
    $filtered = [];
    foreach ($imageFiles as $file) {
        if (strpos(strtolower(basename($file)), $item) !== false) {
            $filtered[] = $file;
        }
    }
    // If filtering results empty, fallback to all category images
    if (count($filtered) > 0) {
        $imageFiles = $filtered;
    } else {
        // Optionally, you can tell user no matches found for specific item
        echo json_encode([
            'response' => "Sorry, no {$category} {$item}s found. Showing all {$category} clothing instead.",
            'images' => array_map(function($path) use ($categories, $category) {
                $baseUrl = dirname($_SERVER['SCRIPT_NAME']);
                $relativePath = str_replace('\\', '/', substr($path, strlen(__DIR__) + 1));
                return $baseUrl . '/' . $relativePath;
            }, $imageFiles)
        ]);
        exit;
    }
}

// Pick up to 4 random images
shuffle($imageFiles);
$selectedImages = array_slice($imageFiles, 0, 3);

$baseUrl = dirname($_SERVER['SCRIPT_NAME']);
$imagesUrl = array_map(function($path) use ($baseUrl) {
    $relativePath = str_replace('\\', '/', substr($path, strlen(__DIR__) + 1));
    return $baseUrl . '/' . $relativePath;
}, $selectedImages);

echo json_encode([
    'response' => "Here are some {$category}" . ($item ? " {$item}s" : "") . " suggestions:",
    'images' => $imagesUrl
]);
exit;
