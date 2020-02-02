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
                                <td class="left" bgcolor="#EEEEEE"><b>Category ID</b> </td>
                                <td>'.$model['categoryName'].'</td> 
                                <td class="left" bgcolor="#EEEEEE"><b>Title</b> </td>
                                <td>'.$model['title'].'</td>    
                            </tr>
                            <tr valign="top">
                                <td class="left" bgcolor="#EEEEEE"><b>Author</b> </td>
                                <td>'.$model['author'].'</td> 
                                <td class="left" bgcolor="#EEEEEE"><b>Create Date</b> </td>
                                <td>'.$model['create_date'].'</td>       
                            </tr>                            

                        </tbody>
                    </table>
                </div>';

    }
    ?>