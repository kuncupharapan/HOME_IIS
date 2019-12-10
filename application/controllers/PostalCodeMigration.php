<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostalCodeMigration
 *
 * @author JOHNY
 */
class PostalCodeMigration extends CI_Controller {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($query = $this->db->query("SELECT * FROM districts ORDER BY regency_id")) {
            $regencies = $query->result_array();
            $i = 0;
            foreach ($regencies as $regency) {
                $this->db->where("city", $regency['regency_id']);
                //$regname = str_replace($regency['name']);
                //$regname = str_replace("KOTA ", "", $regname);
                $this->db->where("sub_district", $regency['name']);
                echo $i + 1 . ' Kabupaten: ' . $regency['regency_id'] . ' Kecamatan: ' . $regency['name'] . '<br>';
                $this->db->update('postalcodeid', array("sub_district" => $regency['id']));
                $i++;
            }
        }
    }

    function checkregencies() {
        //if ($query = $this->db->query("SELECT * FROM postalcodeid WHERE city = 3274 ORDER BY province_code")) {
            if ($query = $this->db->query("SELECT * FROM postalcodeid ORDER BY province_code")) {
            $postals = $query->result_array();
            $i = 0;

            foreach ($postals as $poscode) {
                $match = 0;
                if (!is_numeric($poscode['sub_district'])) {
                    echo $i . '. ' . $poscode['city'] . ' - ' . $poscode['sub_district'] . ' ';
                    if (strpos($poscode['sub_district'], '(') > 1) {
                        $pos = strpos($poscode['sub_district'], '(');
                        $district = explode("(", $poscode['sub_district']);
                        echo $district[0];
                        if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . substr($district[0], 0, $pos - 1) . "%\"")) {
                            $result = $query->result_array();
                            foreach ($result as $dists) {
                                if ($poscode['city'] == $dists['regency_id']) {
                                    $this->db->where("city", $dists['regency_id']);
                                    $this->db->where("sub_district", $poscode['sub_district']);
                                    $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                    $match = 1;
                                }
                            }
                        }

                        if ($match == 0) {
                            if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . str_replace(")", "", $district[1]) . "%\"")) {
                                $result = $query->result_array();
                                foreach ($result as $dists) {
                                    if ($poscode['city'] == $dists['regency_id']) {
                                        $this->db->where("city", $dists['regency_id']);
                                        $this->db->where("sub_district", $poscode['sub_district']);
                                        $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                        $match = 1;
                                    }
                                }
                            }
                        }

                        if ($match == 0) {
                            $keyword = explode(" ", $poscode['sub_district']);
                            foreach ($keyword as $key) {
                                if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $key . "%\"")) {
                                    $result = $query->result_array();
                                    foreach ($result as $dists) {
                                        if ($poscode['city'] == $dists['regency_id']) {
                                            $this->db->where("city", $dists['regency_id']);
                                            $this->db->where("sub_district", $poscode['sub_district']);
                                            $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                            $match = 1;
                                        }
                                    }
                                }
                            }
                        }
                    } elseif (strpos($poscode['sub_district'], '/') > 1) {
                        $district = explode("/", $poscode['sub_district']);
                        $pos = strpos($poscode['sub_district'], '/');
                        $match = 0;
                        $keyword = substr($district[0], 0, strlen($district[0]) - 1);
                        if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $keyword . "%\"")) {
                            $result = $query->result_array();
                            foreach ($result as $dists) {
                                if ($poscode['city'] == $dists['regency_id']) {
                                    $this->db->where("city", $dists['regency_id']);
                                    $this->db->where("sub_district", $poscode['sub_district']);
                                    $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                    $match = 1;
                                }
                            }
                        }

                        if ($match == 0) {
                            $keyword = substr($district[0], 1);
                            if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $keyword . "%\"")) {
                                $result = $query->result_array();
                                foreach ($result as $dists) {
                                    if ($poscode['city'] == $dists['regency_id']) {
                                        $this->db->where("city", $dists['regency_id']);
                                        $this->db->where("sub_district", $poscode['sub_district']);
                                        $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                        $match = 1;
                                    }
                                }
                            }
                        }

                        if ($match == 0) {
                            $keys = explode(" ", $poscode['sub_district']);
                            foreach ($keys as $keyword) {
                                if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $keyword . "%\"")) {
                                    $result = $query->result_array();
                                    foreach ($result as $dists) {
                                        if ($poscode['city'] == $dists['regency_id']) {
                                            $this->db->where("city", $dists['regency_id']);
                                            $this->db->where("sub_district", $poscode['sub_district']);
                                            $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                            $match = 1;
                                        }
                                    }
                                }
                            }
                        }

                        echo ' ' . $keyword;
                    } else {
                        if (strpos($poscode['sub_district'], "-") > 1) {
                            $key = str_replace("-", "", $poscode['sub_district']);
                            if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $key . "%\"")) {
                                $result = $query->result_array();
                                foreach ($result as $dists) {
                                    if ($poscode['city'] == $dists['regency_id']) {
                                        $this->db->where("city", $dists['regency_id']);
                                        $this->db->where("sub_district", $poscode['sub_district']);
                                        $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                        $match = 1;
                                    }
                                }
                            }
                        } else {
                            $district = explode(" ", $poscode['sub_district']);
                            foreach ($district as $word) {
                                if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $word . "%\"")) {
                                    $result = $query->result_array();
                                    foreach ($result as $dists) {
                                        if ($poscode['city'] == $dists['regency_id']) {
                                            $this->db->where("city", $dists['regency_id']);
                                            $this->db->where("sub_district", $poscode['sub_district']);
                                            $this->db->update('postalcodeid', array("sub_district" => $dists['id']));
                                            $match = 1;
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if ($match == 0) {
                        $match = $this->crudematch($poscode['sub_district'], $poscode['city'], $poscode['sub_district']);
                    }
                    /*
                    if ($match == 0) {
                        $match = $this->repairrelation($poscode['sub_district'], $poscode['city'], $poscode['sub_district']);
                    }
                   */
                    echo ' status: ' . $match;
                    $i++;
                    echo '<br>';
                }
            }
        }
    }

    function crudematch($keyword, $city, $subdistrict) {
        $key = substr($keyword, 0, 4);
        $match = 0;
        if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"" . $key . "%\"")) {
            $result = $query->result_array();
            $bestresult = 0;
            $bestdata = array();
            foreach ($result as $dists) {
                if ($city == $dists['regency_id']) {
                    $sim = similar_text($keyword, $dists['name'], $percent);
                    $len = strlen($keyword);

                    if ($sim > $len - 2) {
                        if ($percent > $bestresult) {
                            $bestresult = $percent;
                            $bestdata['city'] = $dists['regency_id'];
                            $bestdata['sub_district_ori'] = $subdistrict;
                            $bestdata['sub_district_rep'] = $dists['id'];
                            $bestdata['name'] = $dists['name'];
                            $bestdata['sim'] = $sim;
                        }
                        //$match = 1;
                    } else {
                        $match = 0;
                    }
                }
            }
            if ($bestresult > 95) {
                $this->db->where("city", $bestdata['city']);
                $this->db->where("sub_district", $bestdata['sub_district_ori']);
                $this->db->update('postalcodeid', array("sub_district" => $bestdata['sub_district_rep']));
                $match = 1;
            }
            if ($bestresult > 0) {
                echo 'key: ' . $bestdata['name'] . ' sim: ' . $bestdata['sim'] . ' %: ' . $bestresult . ' ';
            } else {
                echo 'key: 0 sim: 0 %: 0 ';
            }
        }

        if ($match == 0) {
            $key = substr($keyword, strlen($keyword) - 4);
            if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $key . "\"")) {
                $result = $query->result_array();
                $bestresult = 0;
                $bestdata = array();
                foreach ($result as $dists) {
                    if ($city == $dists['regency_id']) {
                        $sim = similar_text($keyword, $dists['name'], $percent);
                        $len = strlen($keyword);
                        //echo 'key: ' . $dists['name'] . ' sim: ' . $sim . ' %: ' . $percent . ' ';
                        if ($sim > $len - 2) {
                            if ($percent > $bestresult) {
                                $bestresult = $percent;
                                $bestdata['city'] = $dists['regency_id'];
                                $bestdata['sub_district_ori'] = $subdistrict;
                                $bestdata['sub_district_rep'] = $dists['id'];
                                $bestdata['name'] = $dists['name'];
                                $bestdata['sim'] = $sim;
                            }
                        } else {
                            $match = 0;
                        }
                    }
                }
                if ($bestresult > 85) {
                    $this->db->where("city", $bestdata['city']);
                    $this->db->where("sub_district", $bestdata['sub_district_ori']);
                    $this->db->update('postalcodeid', array("sub_district" => $bestdata['sub_district_rep']));
                    $match = 1;
                }

                if ($bestresult > 0) {
                    echo 'key: ' . $bestdata['name'] . ' sim: ' . $bestdata['sim'] . ' %: ' . $bestresult . ' ';
                } else {
                    echo 'key: 0 sim: 0 %: 0 ';
                }
            }
        }
        return $match;
    }

    function repairrelation($keyword, $city, $subdistrict) {
        $relationid = 3209;
        $key = substr($keyword, 0, 4);
        $match = 0;
        if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"" . $key . "%\"")) {
            $result = $query->result_array();
            $bestresult = 0;
            $bestdata = array();
            foreach ($result as $dists) {
                if ($city == $dists['regency_id'] || $dists['regency_id'] == $relationid) {
                    $sim = similar_text($keyword, $dists['name'], $percent);
                    $len = strlen($keyword);

                    if ($sim > $len - 2) {
                        if ($percent > $bestresult) {
                            $bestresult = $percent;
                            $bestdata['city'] = $dists['regency_id'];
                            $bestdata['sub_district_ori'] = $subdistrict;
                            $bestdata['sub_district_rep'] = $dists['id'];
                            $bestdata['name'] = $dists['name'];
                            $bestdata['sim'] = $sim;
                            $bestdata['newcity'] = $dists['regency_id'];
                        }
                        //$match = 1;
                    } else {
                        $match = 0;
                    }
                }
            }
            if ($bestresult > 95) {

                $updatedata = "";
                if ($bestdata['newcity'] == $relationid) {
                    $updatedata = array("sub_district" => $bestdata['sub_district_rep'], 'city' => $bestdata['newcity']);
                } else {
                    $updatedata = array("sub_district" => $bestdata['sub_district_rep']);
                }
                $this->db->where("city", $city);
                $this->db->where("sub_district", $bestdata['sub_district_ori']);
                $this->db->update('postalcodeid', $updatedata);
                $match = 1;
            }
            if ($bestresult > 0) {
                echo 'key: ' . $bestdata['name'] . ' sim: ' . $bestdata['sim'] . ' %: ' . $bestresult . ' ';
            } else {
                echo 'key: 0 sim: 0 %: 0 ';
            }
        }

        if ($match == 0) {
            $key = substr($keyword, strlen($keyword) - 4);
            if ($query = $this->db->query("SELECT * FROM districts WHERE name LIKE \"%" . $key . "\"")) {
                $result = $query->result_array();
                $bestresult = 0;
                $bestdata = array();
                foreach ($result as $dists) {
                    if ($city == $dists['regency_id'] || $dists['regency_id'] == $relationid) {
                        $sim = similar_text($keyword, $dists['name'], $percent);
                        $len = strlen($keyword);
                        //echo 'key: ' . $dists['name'] . ' sim: ' . $sim . ' %: ' . $percent . ' ';
                        if ($sim > $len - 2) {
                            if ($percent > $bestresult) {
                                $bestresult = $percent;
                                $bestdata['city'] = $dists['regency_id'];
                                $bestdata['sub_district_ori'] = $subdistrict;
                                $bestdata['sub_district_rep'] = $dists['id'];
                                $bestdata['name'] = $dists['name'];
                                $bestdata['sim'] = $sim;
                                $bestdata['newcity'] = $dists['regency_id'];
                            }
                        } else {
                            $match = 0;
                        }
                    }
                }
                if ($bestresult > 85) {

                    $updatedata = "";
                    if ($bestdata['newcity'] == $relationid) {
                        $updatedata = array("sub_district" => $bestdata['sub_district_rep'], 'city' => $bestdata['newcity']);
                    } else {
                        $updatedata = array("sub_district" => $bestdata['sub_district_rep']);
                    }
                    $this->db->where("city", $city);
                    $this->db->where("sub_district", $bestdata['sub_district_ori']);
                    $this->db->update('postalcodeid', $updatedata);
                    $match = 1;
                }

                if ($bestresult > 0) {
                    echo 'key: ' . $bestdata['name'] . ' sim: ' . $bestdata['sim'] . ' %: ' . $bestresult . ' ';
                } else {
                    echo 'key: 0 sim: 0 %: 0 ';
                }
            }
        }
        return $match;
    }

}
