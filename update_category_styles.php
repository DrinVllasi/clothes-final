<?php
$directory = __DIR__;
$categoryFiles = glob($directory . '/*{mens-*,womens-*,unisex}.php', GLOB_BRACE);

foreach ($categoryFiles as $file) {
    $content = file_get_contents($file);
    
    // Remove old card styles
    $content = preg_replace('/\.card\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.card-img-top\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.card-body\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.card-title\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.card-text\s*{[^}]+}/', '', $content);
    
    // Remove old navigation styles
    $content = preg_replace('/\.header-container\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.logo\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.logo-link\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.nav-link,?\s*\.dropdown-item\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.dropdown-item\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.dropdown-item:focus,?\s*\.dropdown-item:active\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.dropdown-item:hover\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.nav-item\.dropdown:hover\s*\.dropdown-menu\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.dropdown-menu\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.nav-link\.dropdown-toggle::after\s*{[^}]+}/', '', $content);
    $content = preg_replace('/\.nav-item\.dropdown:hover\s*\.dropdown-toggle::after\s*{[^}]+}/', '', $content);
    $content = preg_replace('/@media\s*\(max-width:\s*768px\)\s*{[^}]+}/', '', $content);
    
    // Add links to common styles if not already present
    $styleLinks = '    <link rel="stylesheet" href="card-styles.css">' . PHP_EOL;
    $styleLinks .= '    <link rel="stylesheet" href="nav-styles.css">';
    
    if (strpos($content, 'card-styles.css') === false || strpos($content, 'nav-styles.css') === false) {
        $content = str_replace(
            '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>',
            '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>' . PHP_EOL . $styleLinks,
            $content
        );
    }
    
    file_put_contents($file, $content);
}

echo "Updated all category pages to use common card and navigation styles.\n";
?> 