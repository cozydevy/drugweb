<?php

$data = file_get_contents("php://input");
$result = urldecode($data);
$result1 = str_replace("re=", "", $result);
$json = json_decode($result1, true);



// $dataresult = json_decode($data, true);
$dataresult = $json;


//loop ดึงข้อมูล 
//  $numcount = count($dataresult['interaction']);

// for($k=0;$k<$numcount;$k++){
//     $namedrug =array_keys($dataresult['interaction'])[$k];
//   $countindrug=count($dataresult['interaction'][$namedrug]);
//     for($p=0;$p<$countindrug;$p++)  {
//       $iddrug=$dataresult['interaction'][$namedrug][$p]["iddrug"];
//       $idotherdrug=$dataresult['interaction'][$namedrug][$p]["idotherdrug"];
//       echo($iddrug);
//       echo($idotherdrug);

//     }


// }

//-----
// $iddrug=$dataresult['interaction']["Busulfan"][0]["id"];


// $numdrug = count($u->interaction);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css" />
  <!-- <link rel="stylesheet" type="text/css" href="css/result.css"> -->


  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

  </script>

  <script>
    $(document).ready(function() {
      var storedArray = JSON.parse(sessionStorage.getItem("result"));
      console.log(storedArray);



      // Assigned User Dropdown Filter





      // Task drug Dropdown Filter
      // $('#drug-filter').on('change', function() {
      //   var drugStatus = this.value;
      //   var arraydrug = [];
      //   $('#drug-filter').change(function() {
      //     arraydrug = $(this).val();
      //     console.log(arraydrug);

      //   })
      //   if (drugStatus === 'All') {
      //     $('.task-list-row').hide().filter(function() {
      //       return $(this).data('drug') != drugStatus;
      //     }).show();
      //   } else {

      //     $('.task-list-row').hide().filter(function() {


      //       return $(this).data('drug') == drugStatus;

      //     }).show();
      //   }
      // });

      // $('#otherdrug-filter').on('change', function() {
      //   var otherdrugStatus = this.value;

      //   if (otherdrugStatus === 'All') {
      //     $('.task-list-row').hide().filter(function() {
      //       return $(this).data('otherdrug') != otherdrugStatus;
      //     }).show();
      //   } else {
      //     $('.task-list-row').hide().filter(function() {
      //       return $(this).data('otherdrug') == otherdrugStatus;
      //     }).show();
      //   }
      // });

      // $('#severity-filter').on('change', function() {
      //   var severitystatus = this.value;

      //   if (severitystatus === 'All') {
      //     $('.task-list-row').hide().filter(function() {
      //       return $(this).data('severity') != severitystatus;
      //     }).show();
      //   } else {
      //     $('.task-list-row').hide().filter(function() {
      //       return $(this).data('otherdrug') == severitystatus;
      //     }).show();
      //   }
      // });

      // $('#documentation-filter').on('change', function() {
      //   var docsstatus = this.value;

      //   if (docsstatus === 'All') {
      //     $('.task-list-row').hide().filter(function() {
      //       return $(this).data('docs') != docsstatus;
      //     }).show();
      //   } else {
      //     $('.task-list-row').hide().filter(function() {
      //       return $(this).data('docs') == docsstatus;
      //     }).show();
      //   }
      // });


    });
  </script>

</head>

<body>
  <br>
  <h2>Result</h2>
  <hr><br>

  <div class="container">
    <div class="row">

      <table class="table">
        <thead>
          <tr class="filters">
            <th>Drug
              <select id="drug-filter" multiple="multiple" class="form-control">


                <?php
                $numcounts = count($dataresult['interaction']);

                for ($k = 0; $k < $numcounts; $k++) {
                  $namedrug = array_keys($dataresult['interaction'])[$k];

                ?>
                  <option><?= $namedrug; ?></option>
                <?php
                }

                ?>


              </select>
            </th>
            <th>Other drug
              <select id="otherdrug-filter" multiple="multiple class=" form-control">


                <?php

                $countindrugs = count($dataresult['interaction'][$namedrug]);
                for ($p = 0; $p < $countindrugs; $p++) {
                  $nameotherdrug = trim($dataresult['interaction'][$namedrug][$p]["otherdrugname"]);

                ?>
                  <option><?= $nameotherdrug; ?></option>
                <?php
                }
                ?>

              </select>
            </th>
            <th>severity
              <select id="severity-filter" class="form-control">
                <option>All</option>
                <option>Unknown</option>

              </select>
            </th>
            <th>documentation
              <select id="documentation-filter" class="form-control">
                <option>All</option>
                <option>Unknown</option>

              </select>
            </th>
            <th>clarification
              <select id="clarification-filter" class="form-control">
                <option>None</option>

              </select>
            </th>
          </tr>
        </thead>
      </table>


      <div class="panel panel-primary filterable">
        <div class="panel-heading">
          <h3 class="panel-title">Result</h3>
          <div class="pull-right"></div>
        </div>





        <table id="task-list-tbl" class="table">
          <thead>
            <tr>
              <th>Drug</th>
              <th>Otherdrug</th>

              <th>summary</th>
              <th>severity</th>
              <th>documentation</th>
              <th>clarification</th>
              <th>reference</th>
            </tr>
          </thead>
          <!-- body -->
          <tbody>
            <?php
            $i = 1;
            // for ($j = 0; $j < $numdrug; $j++) {

            //   $interact->iddrug = $u->interaction[$i];


            // }

            $numcount = count($dataresult['interaction']);


            for ($k = 0; $k < $numcount; $k++) {

              $namedrug = array_keys($dataresult['interaction'])[$k];
              $countindrug = count($dataresult['interaction'][$namedrug]);
              for ($p = 0; $p < $countindrug; $p++) {
                $dataall = array();
                $iddrug = $dataresult['interaction'][$namedrug][$p]["drugname"];
                $idotherdrug = $dataresult['interaction'][$namedrug][$p]["otherdrugname"];

                $alldrung = "- " . $iddrug . "<br>" . "- " . $idotherdrug;
                $summary = $dataresult['interaction'][$namedrug][$p]["summary"];
                $severity = $dataresult['interaction'][$namedrug][$p]["severity"];
                $severitySub = explode(":", $severity);
                $severitySubs = $severitySub[0];

                $documentation = $dataresult['interaction'][$namedrug][$p]["documentation"];

                $docsub = explode(":", $documentation);
                $docsubs = $docsub[0];


                $clarification = $dataresult['interaction'][$namedrug][$p]["clarification"];
                $reference = $dataresult['interaction'][$namedrug][$p]["reference"];

                array_push($dataall, $namedrug, $idotherdrug);


                $aa = implode(" ", $dataall);






            ?>

                <tr id="task-<?= $i ?>" class="task-list-row" data-category="<?= $aa; ?>" data-task-id=<?= $i ?> data-drug="<?= $namedrug; ?>" data-otherdrug="<?= $idotherdrug; ?>" data-severity="<?= $severitySubs; ?>" data-docs="<?= $docsubs; ?>">



                  <td> <?= $namedrug; ?> </td>
                  <td> <?= $idotherdrug; ?> </td>

                  <td> <?= $summary; ?> </td>
                  <td> <?= $severitySubs; ?> </td>
                  <td> <?= $docsubs; ?> </td>
                  <td> <?= $clarification; ?> </td>
                  <td> <?= $reference; ?> </td>


                </tr>
            <?php

                $i++;
              }
            } ?>


          </tbody>
        </table>
      </div>
      <!-- <div>
        <table>
          <tbody>
            <tr>
              <th>Name</th>
              <th>Occupation</th>
              <th>Country</th>
            </tr>
            <?php foreach ($users as $user) { ?>
              <tr>
                <td> <?= $user->name; ?> </td>
                <td> <?= $user->occupation; ?> </td>
                <td> <?= $user->country; ?> </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div> -->
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      var byDrug = [],
        byOtherdrug = [];
      var drugselector = '';
      var otherselector = '';
      var $lis = $('.task-list-row');



      $('#drug-filter').multiselect({
        includeSelectAllOption: true,

        selectAllValue: 'multiselect-all',
        numberDisplayed: 1,
        maxHeight: '300',
        buttonWidth: '200',
        onSelectAll: function(options) {
          $lis.show();
        },
        onChange: function(element, checked) {
          var brands = $('#drug-filter option:selected');
          var drugselected = [];


          $checked = $('#drug-filter option:selected');
          drugselector = '';
          if ($checked.length) {
            $(brands).each(function(index, brand) {
              drugselected.push([$(this).val()]);
              byDrug.push([$(this).val()]);
              if (drugselector === '') {
                drugselector += "[data-category~='" + $(this).val() + "']";
              } else {
                drugselector += ",[data-category~='" + $(this).val() + "']";
              }
            });

          } else {
            $lis.show();
          }
          $lis.hide();
          console.log(drugselector);

          if (drugselector === '' && otherselector === '') {
            $lis.show();


          } else if (drugselector === '') {
            $('.task-list-row').filter(otherselector).show();


          } else if (otherselector === '') {
            $('.task-list-row').filter(drugselector).show();
          } else {
            $('.task-list-row').filter(drugselector).filter(otherselector).show();

          }


        }
      });
      // $('#otherdrug-filter').multiselect({
      //   includeSelectAllOption: true,
      //   selectAllValue: 'multiselect-all',
      //   numberDisplayed: 1,
      //   nonSelectedText: "Select an option",
      //   allSelectedText: "Selected all",
      //   nSelectedText: "Selected",
      //   maxHeight: '300',
      //   buttonWidth: '235',
      // });


      $('#otherdrug-filter').multiselect({
        includeSelectAllOption: true,

        selectAllValue: 'multiselect-all',
        numberDisplayed: 1,
        maxHeight: '300',
        buttonWidth: '200',
        onSelectAll: function(options) {

          $lis.show();
        },
        onChange: function(element, checked) {
          var brands = $('#otherdrug-filter option:selected');
          var otherselected = [];
          $checked = $('#otherdrug-filter option:selected');
          otherselector = '';
          if ($checked.length) {
            $(brands).each(function(index, brand) {
              otherselected.push([$(this).val()]);
              byOtherdrug.push([$(this).val()]);
              if (otherselector === '') {
                otherselector += "[data-category~='" + $(this).val() + "']";
              } else {
                otherselector += ",[data-category~='" + $(this).val() + "']";
              }
            });

          } else {
            $lis.show();
          }
          $lis.hide();
          console.log(otherselector);

          if (drugselector === '' && otherselector === '') {
            $lis.show();


          } else if (drugselector === '') {
            $('.task-list-row').filter(otherselector).show();


          } else if (otherselector === '') {
            $('.task-list-row').filter(drugselector).show();
          } else {
            $('.task-list-row').filter(drugselector).filter(otherselector).show();

          }








        }
      });



    });
  </script>
  <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>

</body>

</html>

<!-- 
if (this.checked) {
          byDrug.push("[data-category~='" + $(this).attr("value") + "']");
        } else {
          var myIndex = byDrug.indexOf("[data-category~='" + $(this).attr("value") + "']");

          if (myIndex !== -1) {
            byDrug.splice(myIndex, 1);
          }
        }
        console.log(byDrug); -->