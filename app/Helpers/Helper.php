<?php


namespace App\Helpers;
use Illuminate\Support\Str;
class Helper
{
    public static function menus($menus, $parent_id = 0, $char = '')
    {
        $html = '';
        foreach($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '
                    <tr>
                        <td>'. $menu->id .'</td>
                        <td>'. $menu->name .'</td>
                        <td>'. self::active($menu->active) .'</td>
                        <td>'. $menu->updated_at .'</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/menus/edit/'. $menu->id .'"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a class="btn btn-danger btn-sm" href="#" onclick = "removeRow('. $menu->id .', \'/admin/menus/destroy\')"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                ';
                unset($menus[$key]);

                $html .= self::menus($menus, $menu->id, $char .'--');
            }
        }
        return $html;
    }

    public static function active($active = 0) : string
    {
        return $active == 0 ? '<span class = "btn btn-danger btn-xs">NO</span>' : '<span class = "btn btn-success btn-xs">YES</span>';
    }

    public static function menu($menus, $parent_id = 0){
        $html = '';
        foreach($menus as $key => $menu)
        {
            if($menu->parent_id == $parent_id)
            {
                $html .= '
                    <li>
                        <a href="' . \Str::slug($menu->name, '-') . '">
                            ' . htmlspecialchars($menu->name) . '
                        </a>';
                if (self::isChild($menus, $menu->id)) {
                    $html .= '<ul class="sub-menu">';
                    $html .= self::menu($menus, $menu->id);
                    $html .= '</ul>';
                };
                $html .= '</li>';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id)
    {
        foreach($menus as $k => $menu)
        {
            if($menu->parent_id == $id)
            {
                return true;
            }
            return false;
        }
    }

}

?>