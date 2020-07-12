<?php

    // use Yii;
  
    
    function TableCourse($id = ''){

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand("SELECT * FROM course a JOIN coursecategory b ON a.categoryID = b.categoryID WHERE a.courseID = ".$id."");
                                      
        $model = $sql->queryOne();    
        return '<div class="table-responsive" style="width:100%;padding:11px">        
                    <table>
                        <tbody>
                            <tr valign="top">
                                <td class="left" bgcolor="#EEEEEE"><b>Kategori</b> </td>
                                <td>'.$model['categoryName'].'</td> 
                                <td class="left" bgcolor="#EEEEEE"><b>Judul</b> </td>
                                <td>'.$model['title'].'</td>    
                            </tr>
                            <tr valign="top">
                                <td class="left" bgcolor="#EEEEEE"><b>Pembuat</b> </td>
                                <td>'.$model['author'].'</td> 
                                <td class="left" bgcolor="#EEEEEE"><b>Tanggal Buat</b> </td>
                                <td>'.$model['create_date'].'</td>       
                            </tr>                            

                        </tbody>
                    </table>
                </div>';

    }
    ?>