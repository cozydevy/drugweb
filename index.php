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
    });
  </script>

</head>


<body class="container">

  <div class="row">

    <?php

    //  $arr = json_decode( $resultdrug );
    $arr = json_decode($_COOKIE['namedrug'], true);



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

          foreach ($arr as $item) { //foreach element in $arr
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
          <option value="option1">Option 1</option>

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
    const drugs = [];

    $("#btndata").click(function() {
      alert($('[name="duallistbox_demo1[]"]').val());
      alert($('[name="duallistbox_demo2[]"]').val());

      var list1 = $('[name="duallistbox_demo1[]"]').val()
      var list2 = $('[name="duallistbox_demo2[]"]').val()
      drugs.push(...list1)
      drugs.push(...list2)
      console.log(drugs)
      return false;
    });
  </script>

</body>