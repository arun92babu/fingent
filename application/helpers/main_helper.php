<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------




if ( ! function_exists('checkemployeecode'))
{
    function checkemployeecode($empcode='')
    {
        $ci=& get_instance();
        $ci->db->where('employee_code',$empcode);
        $query = $ci->db->get('employee');
        return ($query->result_array())?$query->result_array(): FALSE;
    }
}
if ( ! function_exists('getdepartmentcode'))
{
    function getdepartmentcode($deptname='')
    {
        $ci=& get_instance();
        $ci->db->where('department_name',$deptname);
        $query = $ci->db->get('department');
        return ($query->result_array())?$query->result_array(): FALSE;
    }
}

// ------------------------------------------------------------------------





























// ------------------------------------------------------------------------

if ( ! function_exists('type'))
{
    function type($param=0)
    {
        if($param > 0)
        {
            if ($param == 1) {
                $type = 'Regular';
            } elseif ($param == 2) {
                $type = 'Break';
            }
            return  $type;
        }
        else
        {
            $type_data = array(
                                array('type_id' => '1', 'type_key' => 'regular','type_name' => 'Regular'),
                                array('type_id' => '2', 'type_key' => 'break', 'type_name' => 'Break')
                            );
            return $type_data;
        }
    }
}





// ------------------------------------------------------------------------
/* End of file status_helper.php */
/* Location: ./application/helpers/status_helper.php */