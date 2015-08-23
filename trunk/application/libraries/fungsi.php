<?php 
class Fungsi
{
    function Fungsi()
    {
        $this->CI =get_instance();
    }
    function create_combobox($name,$dbobj,$key,$value,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        $select .= '<option value="">:: pilih ::</option>';
        foreach($dbobj->result() as $row)
        {
            $selected = '';
            if($edit!='')
            {
                if($row->$key == $edit)
                {
                    $selected = "selected='selected'";
                }
            }
            $select .= '<option value="'.$row->$key.'" '.$selected.'>'.$row->$value.'</option>';
        }
        $select .= '</select>';
        return $select;
    }
}
?>