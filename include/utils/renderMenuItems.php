<?php
include 'include/classes/MenuItem.php'; //being called from root folder

function renderMenuItems($conn, $isIndex)
{
    $menuRowOneHTML = "";
    $menuRowTwoHTML = "";

    $templateHTML = '<div class="item" data-id="$id">
                    <div class="item-parent" name="$name" data-id="$id" value="$price">
                        <img class="increment" src="$imagePath" alt="$name">
                        <div class="button-container">
                            <button class="itemButton decrement">-</button>
                            <button class="itemButton increment">+</button>
                            <h3>$name $$price</h3>
                        </div>
                    </div>
                </div>';

    $menuObj = new MenuItem($conn);


    $menuItems = array();

    if ($isIndex) {
        $typeOneItems = $menuObj->getTypeOneMenuItems();
        $menuItems = array_merge($menuItems, $typeOneItems);
    } else {
        $typeTwoAndThreeItems = $menuObj->getTypeTwoAndThreeMenuItems();
        $menuItems = array_merge($menuItems, $typeTwoAndThreeItems);
    }

    $itemCount = 0;
    foreach ($menuItems as $item) {
        $itemCount++;

        $vars = array(
            '$id' => $item['menu_item_id'],
            '$name' => $item['item'],
            '$price' => $item['price'],
            '$imagePath' => $item['image_path']
        );

        if ($itemCount <= 4) {
            $menuRowOneHTML .= strtr($templateHTML, $vars);
        } else {
            $menuRowTwoHTML .= strtr($templateHTML, $vars);
        }
    }

    return array($menuRowOneHTML, $menuRowTwoHTML);
}
