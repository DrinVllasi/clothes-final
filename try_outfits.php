<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap 5 JS (dropdowns need this) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php
include 'fonts.php';
include 'header.php';

$gender = $_GET['gender'] ?? '';
$category = $_GET['category'] ?? '';

function getImages($gender, $category) {
    $dir = "clothes/$gender/";
    return glob($dir . "*$category*.{jpg,jpeg,png,gif}", GLOB_BRACE);
}

$category_map = [
    'mens' => [
        'tops' => ['hoodie', 'buttonup', 'shirt', 'longsleeve', 'jacket'],
        'bottoms' => ['baggy', 'bootcut', 'straight', 'slim', 'jorts'],
        'shoes' => ['shoe', 'boot'],
        'accessories' => ['bracelet', 'ring', 'necklace', 'belt']
    ],
    'womens' => [
        'tops' => ['hoodie', 'shirt', 'longsleeve', 'jacket'],
        'bottoms' => ['baggy', 'bootcut', 'flare', 'shorts', 'skirts', 'jorts'],
        'shoes' => ['shoe', 'boot'],
        'accessories' => ['bracelet', 'ring', 'necklace', 'belt', 'earring']
    ]
];

$images = [];
if ($gender && $category && isset($category_map[$gender][$category])) {
    foreach ($category_map[$gender][$category] as $subcat) {
        $images = array_merge($images, getImages($gender, $subcat));
    }
}
?>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    min-height: 100vh;
}

.page-container {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.top-section {
    width: 100%;
    padding: 20px;
    background: #f8f8f8;
    border-bottom: 1px solid #ddd;
    flex: 1;
    max-height: 600px; /* Fixed height for top section */
    overflow: hidden; /* Prevent scrolling of the entire section */
}

.dropdown-group {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    justify-content: center;
}

.dropdown-group select {
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    background: #fff;
    min-width: 200px;
}

.card-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    gap: 15px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    height: 450px; /* Fixed height for exactly 3 rows */
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #888 #f1f1f1;
}

/* Custom scrollbar styles */
.card-grid::-webkit-scrollbar {
    width: 8px;
}

.card-grid::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.card-grid::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.card-grid::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.card {
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #fff;
    padding: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    text-align: center;
    cursor: grab;
    transition: transform 0.2s ease;
    height: 180px; /* Fixed height for cards */
}

.card:hover {
    transform: scale(1.03);
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 6px;
}

.bottom-section {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 40px 20px;
    background: #fff;
    margin-top: auto;
    border-top: 1px solid #ddd;
}

.drop-zone {
    width: 300px;
    height: 400px;
    border: 2px dashed #999;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    text-align: center;
    background-color: #fafafa;
    transition: background 0.3s ease;
    position: relative;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.drop-zone img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 6px;
    object-fit: cover;
}

@media (max-width: 768px) {
    .dropdown-group {
        flex-direction: column;
        align-items: center;
    }
    
    .dropdown-group select {
        width: 100%;
        max-width: 300px;
    }
    
    .bottom-section {
        flex-direction: column;
        align-items: center;
    }
    
    .drop-zone {
        width: 100%;
        max-width: 300px;
        height: 400px;
    }
}
</style>

<div class="page-container">
    <div class="top-section">
        <form method="get" class="dropdown-group">
            <select name="gender" onchange="this.form.submit()">
                <option value="">Select Gender</option>
                <option value="mens" <?php if ($gender == 'mens') echo 'selected'; ?>>Mens</option>
                <option value="womens" <?php if ($gender == 'womens') echo 'selected'; ?>>Womens</option>
            </select>

            <?php if ($gender): ?>
            <select name="category" onchange="this.form.submit()">
                <option value="">Select Category</option>
                <?php foreach ($category_map[$gender] as $cat => $subs): ?>
                    <option value="<?php echo $cat; ?>" <?php if ($category == $cat) echo 'selected'; ?>>
                        <?php echo ucfirst($cat); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php endif; ?>
        </form>

        <div class="card-grid">
            <?php foreach ($images as $img): ?>
                <div class="card" draggable="true" ondragstart="drag(event)">
                    <img src="<?php echo htmlspecialchars($img); ?>" alt="Clothing Item">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="bottom-section">
        <div class="drop-zone" id="drop-tops" data-accept="hoodie,buttonup,shirt,longsleeve,jacket" ondrop="drop(event)" ondragover="allowDrop(event)">
            Drop Tops Here
        </div>
        <div class="drop-zone" id="drop-bottoms" data-accept="baggy,bootcut,straight,slim,jorts,flare,shorts,skirts" ondrop="drop(event)" ondragover="allowDrop(event)">
            Drop Bottoms Here
        </div>
        <div class="drop-zone" id="drop-shoes" data-accept="shoe,boot" ondrop="drop(event)" ondragover="allowDrop(event)">
            Drop Shoes Here
        </div>
        <div class="drop-zone" id="drop-accessory1" data-accept="bracelet,ring,necklace,belt,earring" ondrop="drop(event)" ondragover="allowDrop(event)">
            Drop Accessory 1
        </div>
        <div class="drop-zone" id="drop-accessory2" data-accept="bracelet,ring,necklace,belt,earring" ondrop="drop(event)" ondragover="allowDrop(event)">
            Drop Accessory 2
        </div>
    </div>
</div>

<script>
function allowDrop(ev) {
    ev.preventDefault();
}
function drag(ev) {
    ev.dataTransfer.setData("imgSrc", ev.target.src);
    ev.dataTransfer.setData("imgName", ev.target.src.split('/').pop().toLowerCase());
}
function drop(ev) {
    ev.preventDefault();
    const zone = ev.target.closest('.drop-zone');
    const accepted = zone.dataset.accept.split(',');
    const src = ev.dataTransfer.getData("imgSrc");
    const name = ev.dataTransfer.getData("imgName");

    if (!accepted.some(a => name.includes(a))) {
        alert("This item doesn't belong here.");
        return;
    }

    zone.innerHTML = '<img src="' + src + '">';
    localStorage.setItem(zone.id, src);
}

window.onload = function() {
    document.querySelectorAll('.drop-zone').forEach(zone => {
        const savedSrc = localStorage.getItem(zone.id);
        if (savedSrc) {
            zone.innerHTML = '<img src="' + savedSrc + '">';
        }
    });
};
</script>

<?php include 'footer.php'; ?>
