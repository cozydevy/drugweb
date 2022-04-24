<?php 
session_start();

?>
<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Dual Listbox</title>

  <!-- <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> -->
  <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.css">
  <link rel="stylesheet" type="text/css" href="src/bootstrap-duallistbox.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/prettify/r298/run_prettify.min.js"></script>
  <script src="src/jquery.bootstrap-duallistbox.js"></script>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="js/jquery.cookie.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
    <script src="js/jquery.redirect.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <script>
    var res = 0;

    $(document).ready(function() {
      console.log("document loaded");
      $.ajax({
        url: 'http://127.0.0.1/drugapi/api/drug/read.php',
        data: {},
        type: 'get',
        success: function(result) {

          $.cookie('namedrug', JSON.stringify(result.drug));
          var storedAry = JSON.parse($.cookie('namedrug'));
          console.log(storedAry)
        }
      });
      $.ajax({
        url: 'http://127.0.0.1/drugapi/api/otherdrug/read.php',
        data: {},
        type: 'get',
        success: function(result) {

          $.cookie('nameotherdrug', JSON.stringify(result.otherdrug));
          var storedAry = JSON.parse($.cookie('nameotherdrug'));
          console.log(storedAry)
        }
      });
    });
  </script>

</head>


<body class="container">

  <div class="row">

    <?php

    //  $arr = json_decode( $resultdrug );
    $resultdrug = json_decode($_COOKIE['namedrug'], true);
    $resultotherdrug = json_decode($_COOKIE['nameotherdrug'], true);



    // $arr = json_decode('[{"var1":"9","var2":"16","var3":"16"},{"var1":"8","var2":"15","var3":"15"}]',true);

    // foreach($arr as $item) { //foreach element in $arr
    //     $uses = $item['var1']; //etc
    //     echo $users;
    // }
    ?>




    <div class="col">
      <h3> Drug </h3>

      <form id="demoform1" action="#" method="post">

        <select multiple="multiple" size="10" name="duallistbox_demo1[]" class="demo1">
          <?php

          foreach ($resultdrug as $item) { //foreach element in $arr
          ?>

            <option value="<?= $item['id'] ?>"><?= $item['drugname'] ?> </option>

          <?php } ?>

        </select>
        <br>
      </form>

      <script>
        var demo2 = $('.demo1').bootstrapDualListbox({

          preserveSelectionOnMove: 'moved',
          moveOnSelect: false,

        });
      </script>

    </div>
    <div class="col">
      <h3>Other Drug </h3>

      <form id="demoform2" action="#" method="post">

        <select multiple="multiple" size="10" name="duallistbox_demo2[]" class="demo2">
          <?php

          foreach ($resultotherdrug as $item) { //foreach element in $arr
          ?>

            <option value="<?= $item['id'] ?>"><?= $item['otherdrug'] ?> </option>

          <?php } ?>


        </select>
        <br>

      </form>

      <script>
        var demo2 = $('.demo2').bootstrapDualListbox({

          preserveSelectionOnMove: 'moved',
          moveOnSelect: false,

        });
      </script>

    </div>


  </div>

  <div class="row justify-content-md-center">
    <div class="col-md-auto">

      <button id="btndata" type="button" class="btn btn-primary">Search data</button>
    </div>

  </div>

  </div>


  <script>
    var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
    var demo2 = $('select[name="duallistbox_demo2[]"]').bootstrapDualListbox();
    // var drugs = [];

    var drugs = {
      drug: [],
      otherdrug: []
    };

    function getSelectValues(select) {
      console.log(select);

      var result = [];
      var options = select;
      var opt;
      var iLen = options.length
      for (var i = 0; i < iLen; i++) {
        opt = options[i];

        if (opt.selected) {
          result.push(opt.text);
        }
      }
      return result;
    }
    $("#btndata").click(function() {
      // alert($('[name="duallistbox_demo1[]"]').val());
      // alert($('[name="duallistbox_demo2[]"]').val());

      // alert( $('select[name="duallistbox_demo1[]"]  option:selected' ).text());
      // alert( $('select[name="duallistbox_demo2[]"]  option:selected' ).text());

      var drugall = $('[name="duallistbox_demo1[]"]').val();
      var otherdrugall = $('[name="duallistbox_demo2[]"]').val();

      var drugallname = $('select[name="duallistbox_demo1[]"]  option:selected').text();
      var otherdrugallname = $('select[name="duallistbox_demo2[]"]  option:selected').text();

      const sp_drugallname = drugallname.split(" ");
      const sp_otherdrugallname = otherdrugallname.split(")");

      var el =  $('select[name="duallistbox_demo2[]_helper2"]')[0];
      const arr_otherdrugallname=getSelectValues(el);
      
      for (let i = 0; i < drugall.length; i++) {

        var id = drugall[i];
        var namedrug = sp_drugallname[i];

        drugs.drug.push({
          "iddrug": id,
          "drugname": namedrug

        })
      }

      for (var j in otherdrugall) {

        var item = otherdrugall[j];
        var otherdrugname = arr_otherdrugallname[j];
        drugs.otherdrug.push({
          "idotherdrug": item,
          "otherdrugname": otherdrugname
        })
      }

      const drugsearch = JSON.stringify(drugs);
      console.log(drugsearch)


      $.ajax({
        type: "POST",
        url: "http://127.0.0.1/drugapi/api/interact/read_one.php",
        dataType: 'json',
        data: JSON.stringify(drugs),
        success: function(result) {

          window.sessionStorage.setItem("result", JSON.stringify(result));
          var storedArray = JSON.parse(sessionStorage.getItem("result"));
        
          var dictstring = JSON.stringify(result);

          console.log(typeof storedArray);
          document.cookie = "username=John Doe";
          let x = document.cookie["username"];
          console.log(x)
          // $.redirect("http://127.0.0.1/webdrug/result2.php",result); 
     
          // location.href = "http://127.0.0.1/webdrug/result2.php"


        },
        error: function(result) {
          // alert(JSON.stringify(result));
          console.log(JSON.stringify(result))
        }
      });
      // console.log(JSON.stringify(drugs))
      return false;
    });
  </script>

</body>