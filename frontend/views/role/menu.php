<?php
    use yii\helpers\Html;

    
    $this->title = 'Role Menu';
    $this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

    $this->registerCss("
        .cari, .add{
            cursor:pointer;
        }
        #list, #submit{
            display:none;
            margin-top: 10px;
            padding: 10px;
        }
        
    ");
    $this->registerJs("
        
        function load(key){
            $.post('./?r=api/list-menu',{
                data: key
            },
            function(data, status){	

                $('#list').html(data); 
                document.getElementById(\"list\").style.display = \"block\";   
                document.getElementById(\"submit\").style.display = \"block\";   
            });
        }

        $(document).on(\"click\", \".cari\", function () {	
            tableApi('.datatable','./?r=api/division');
        });
        
        $(document).on(\"click\", \"#submit\", function () {	
           
            var sList = '';
            $('input[type=checkbox][name=check]').each(function () {
                var sThisVal = (this.checked ? 1 : 0);
                sList += (sList=='' ? sThisVal : ','+ sThisVal);
            });
            var details = '';
            $('input[type=checkbox][name=detail]').each(function () {
                var detailVal = (this.checked ? 1 : 0);
                details += (details=='' ? detailVal : ','+ detailVal);
            });

            $.post('./?r=api/post-privilege',{
                master: sList,                
                role: $('#idrole').val()
            },
            function(data, status){	                            
                // console.log ('master '+sList+ 'detail '+details);
                // console.log(status)
                if(status == 'success'){
                    $(\"#alert\").append('<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\"aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Well done!</strong> You successfully set Role Privillege.</div>');
                }
                var key = $('#idrole').val()+';'+$('#role').val();
                load(key);
            })
            
        });


        $(document).on(\"click\", \".add\", function () {	
            $('.divisi').modal('hide');
            var key_ = $(this).data('id');	            
            var myarr = key_.split(';');
            
            document.getElementById(\"idrole\").value = myarr[0];
            document.getElementById(\"role\").value = myarr[1];
           
            load(key_);
            
        });
          
    ");
?>

<h1> Role Menu</h1>
<hr/>
<div id="alert"></div>
<div class="card card-block">
    <div class="form-group"  style="padding:10px">
        
        <label>Role Name</label>


        <div class="input-group">
            <input type="text" name="role"  id="role" class="form-control" readonly />
            <input type="hidden" name="idrole"  id="idrole" class="form-control" readonly/>
            <span style="border:0px;width: 30px;background-color: darkgrey;" class="input-group-addon add-on cari"  data-toggle="modal" data-target=".divisi" title="Search Division">
                <i style="float:right;margin: 10px;" class="fa fa-search"></i>
            </span>
        </div>

    </div>     
</div>


<div class="card card-block" id="list">


    
</div>

<div class="form-group" id="submit">
    <button type="submit" class="btn btn-success">Set Menu</button>    
</div>

<!-- ------------ MODAL ADD DIVISI------------------>
<div class="modal fade divisi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 800px" >
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				<!-- <h4 class="modal-title" id="myModalLabel">Division</h4> -->
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					 <table class="table table-bordered datatable" style="width:100%">
						<thead>
							<tr>
								<th>
									Role Name
								</th>
								<th>
									Action
								</th>								
							</tr>
						</thead>
					</table>
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>						
			</div>
		</div>
	</div>
</div>
<!-- ------------ /MODAL ADD DIVISI ------------------>