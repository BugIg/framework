<avored-menu-builder
    :front-menus="{{ $frontMenus }}"
    :categories="{{ $categories }}"
    :init-tree="{{ $menu->menu_tree ?? json_encode([]) }}"
    category-route-name="avored.category.show"
/>
