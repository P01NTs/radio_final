<!DOCTYPE html>
<html>

<head>
    <title>XML File Upload</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="xmlFile">Upload XML File:</label>
        <input type="file" name="xmlFile" id="xmlFile" accept=".xml">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["xmlFile"]["error"] == UPLOAD_ERR_OK) {
        $xmlFile = $_FILES["xmlFile"]["tmp_name"];

        // Load the XML file
        $xml = simplexml_load_file($xmlFile);

        // Get the main title from the XML
        $mainTitle = (string)$xml->channel->title;

        // Initialize an array to store item data
        $items = array();

        // Loop through each item in the XML
        foreach ($xml->channel->item as $item) {
            $title = (string)$item->title;
            $link = (string)$item->link;
            $description = (string)$item->description;
            $enclosure = (string)$item->enclosure['url'];
            $broadcast = (string)$item->broadcast;
            $publisher = (string)$item->publisher;

            // Store item data in an associative array
            $itemData = array(
                'title' => $title,
                'link' => $link,
                'description' => $description,
                'enclosure' => $enclosure,
                'broadcast' => $broadcast,
                'publisher' => $publisher,
            );

            // Add the item data to the items array
            $items[] = $itemData;
        }
        var_dump($items);
        // Now, you can use $mainTitle and $items as needed
    } else {
        echo "Error uploading file.";
    }
}
?>