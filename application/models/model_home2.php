<?php
class Model_home2 extends Ci_Model{
  
 function statistik_pengunjung()
 { 
  $sql = $this->db->query("
   
  select
  ifnull((SELECT count(id_log) FROM (log)WHERE(('Month(date)', 1) as januari, (('Month(date)', 2) as Februari, (('Month(date)', 3) as Maret, (('Month(date)', 4) as April, (('Month(date)', 5) as Mei, (('Month(date)', 6) as Juni, (('Month(date)', 7) as Juli, (('Month(date)', 8) as Agustus, (('Month(date)', 9) as September, (('Month(date)', 10) as Oktober, (('Month(date)', 11) as November, (('Month(date)', 12) as Desember AND ('YEAR(date)', 2016))),0)
  
  from log GROUP BY YEAR(date) ");
   
  return $sql;
   
 }
  
  
}