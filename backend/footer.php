   <footer class="position-absolute bottom-0 bg-dash-dark-2 text-white text-center py-3 w-100 text-xs" id="footer">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="mb-0 text-dash-gray">2022 &copy; MivaNaija.</p>
            </div>
          </footer>
        </section>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="js/jquery.3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="datatable/datatables.min.js"></script>
<script src="datatable/Responsive-2.2.9/js/dataTables.responsive.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
		$(document).ready(function() {
			$('#example').DataTable();
		} );
        })
        $(document).ready(function(){
         $('.reachdel').click(function(){
              var reachdel = $(this).attr("id");
              if(confirm("Are you sure you want to delete?")){
                  $.ajax({
                    url:'ajaxcall.php',
                    method:'POST',
                    data:'reachdel='+reachdel,
                    success:function(data){
                      alert(data);
                      window.location = "reachouts";
                    },
                    error: function(data){
                      alert(data);
                      window.location = "reachouts";
                    }
                  });

                }
            });
         })
          $(document).ready(function(){
         $('.userdel').click(function(){
              var userdel = $(this).attr("id");
              if(confirm("Are you sure you want to delete?")){
                  $.ajax({
                    url:'ajaxcall.php',
                    method:'POST',
                    data:'userdel='+userdel,
                    success:function(data){
                      alert(data);
                      window.location = "users";
                    },
                    error: function(data){
                      alert(data);
                      window.location = "users";
                    }
                  });

                }
            });
         })
         $(document).ready(function(){
         $('.delsuser').click(function(){
              var delsuser = $(this).attr("id");
              if(confirm("Are you sure you want to delete?")){
                  $.ajax({
                    url:'ajaxcall.php',
                    method:'POST',
                    data:'delsuser='+delsuser,
                    success:function(data){
                      alert(data);
                      window.location = "specialusers";
                    },
                    error: function(data){
                      alert(data);
                      window.location = "specialusers";
                    }
                  });

                }
            });
         })
        $(document).ready(function(){
         $('.blogdel').click(function(){
              var blogdel = $(this).attr("id");
              if(confirm("Delete Blog?")){
                  $.ajax({
                    url:'ajaxcall.php',
                    method:'POST',
                    data:'blogdel='+blogdel,
                    success:function(data){
                      alert(data);
                      window.location = "blogs";
                    },
                    error: function(data){
                      alert(data);
                      window.location = "blogs";
                    }
                  });

                }
            });
         })
         $(document).ready(function(){
         $('.comdel').click(function(){
              var comdel = $(this).attr("id");
              if(confirm("Delete Comment?")){
                  $.ajax({
                    url:'ajaxcall.php',
                    method:'POST',
                    data:'comdel='+comdel,
                    success:function(data){
                      alert(data);
                      window.location = "blogs";
                    },
                    error: function(data){
                      alert(data);
                      window.location = "blogs";
                    }
                  });

                }
            });
         })
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>