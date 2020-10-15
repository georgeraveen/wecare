<?php



function redirect($url) {

    echo "<script language=\"JavaScript\">\n";
    echo "<!-- hide from old browser\n\n";

    echo "window.location = \"" . $url . "\";\n";

    echo "-->\n";
    echo "</script>\n";

    return true;
}

// function set_rights($menus, $menuRights, $topmenu) {
//     // echo "\n";
//     // print_r($menus);
//     // echo "\n";
//     // print_r($menuRights);
//     $data = array();

//     for ($i = 0, $c = count($menus); $i < $c; $i++) {

//         // echo "i loop";
//         $row = array();
//         for ($j = 0, $c2 = count($menuRights); $j < $c2; $j++) {
//             // echo "j loop";
//             if ($menuRights[$j]["moduleID"] == $menus[$i]["moduleID"]) {
//                 // echo "if".$j;
//                 if (authorize($menuRights[$j]["creat"]) || authorize($menuRights[$j]["edit"]) ||
//                         authorize($menuRights[$j]["delet"]) || authorize($menuRights[$j]["view"])
//                 ) {

//                     $row["menu"] = $menus[$i]["moduleGroupNo"];
//                     $row["menu_name"] = $menus[$i]["moduleName"];
//                     $row["page_name"] = $menus[$i]["webpage"];
//                     $row["create"] = $menuRights[$j]["creat"];
//                     $row["edit"] = $menuRights[$j]["edit"];
//                     $row["delete"] = $menuRights[$j]["delet"];
//                     $row["view"] = $menuRights[$j]["view"];

//                     $data[$menus[$i]["moduleGroupNo"]][$menuRights[$j]["moduleID"]] = $row;
//                     $data[$menus[$i]["moduleGroupNo"]]["top_menu_name"] = $menus[$i]["moduleID"];
//                 }
//             }
//         }
//     }
//     // print_r($data);
//     return $data;
// }

// function authorize($module) {
//     return $module == "0" ? FALSE : TRUE;
// }

?>