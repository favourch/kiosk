<?php
include "../db/db.php";
include "../actions/misc_functions.php";

$student_id = $_GET['student_id'];
$query_journal = mysql_query("SELECT trans_date FROM accounting_journal_t ORDER BY trans_date DESC") or die(trigger_error(trigger_error(mysql_error())));
if(mysql_num_rows($query_journal)){
  $row_journal = mysql_fetch_assoc($query_journal);
  $latest_date = date("M d, Y H:i A",strtotime($row_journal['trans_date']));
}
else{
  $latest_date = "";
}

?>
                    <div class="container">
                      <div class="container">
                        <h1 style="float:left;">Payments </h1>
                        <h5 style="float:right;margin-top:40px;font-style:italic"> Transaction posted as of <?php echo $latest_date?> </h5>
                      </div>
                        <?php
                        $query_sem = mysql_query("SELECT sem_id FROM accounting_journal_t WHERE student_id='{$student_id}' GROUP BY sem_id ORDER BY sem_id DESC") or die(trigger_error(trigger_error(mysql_error())));
                        if(mysql_num_rows($query_sem)>0){
                            while($row_sem = mysql_fetch_assoc($query_sem)){
                                $sem_id = $row_sem['sem_id'];

                            ?>
                                <h4><?php echo sem_name($sem_id);?></h4>
                                <table class="table table-bordered" style="width:100%">

                                  <thead>
                                    <th >Trans Date</th>
                                    <th>Trans Code</th>
                                    <th>Ref No</th>
                                    <th>Particulars</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Balance</th>
                                  </thead>

                                  <tbody>
                                    <?php 
                                    $total_dabit  = 0;
                                    $total_credit = 0;
                                    $total_bal    = 0;
                                    $fees_count = 0;
                                    $query_payments = mysql_query(" SELECT * 
                                                                    FROM accounting_journal_t
                                                                    WHERE student_id = '$student_id'
                                                                      AND  sem_id = '$sem_id'
                                                                      ORDER BY trans_date ASC
                                                                  ") or die(trigger_error(mysql_error()));

                                    if(mysql_num_rows($query_payments)>0){
                                        $sub_total_debit = 0;
                                        $sub_total_credit = 0;
                                        $sub_total_bal = 0;
                                        while($row_payments = mysql_fetch_assoc($query_payments)){
                                            $fees_count++;
                                            $trans_date = $row_payments['trans_date'];
                                            $trans_code = $row_payments['trans_code'];
                                            $ref_no = $row_payments['ref_no'];
                                            $particulars = $row_payments['particulars'];
                                            $sub_total_debit += $debit = $row_payments['debit'];
                                            $sub_total_credit += $credit = $row_payments['credit'];
                                            $bal = $row_payments['bal'];
                                            //$sub_total_bal += 
                                            //$total_payment+=$amount;


                                            
                                            ?>
                                            <tr>
                                              <th style="text-align:center"><?php echo date("M d, Y H:i A",strtotime($trans_date));?></th>
                                              <th style="text-align:right"><?php echo $trans_code?></th>
                                              <th style="text-align:left"><?php echo $ref_no;?></th>
                                              <th style="text-align:left"><?php echo $particulars?></th>
                                              <th style="text-align:right"><?php echo number_format($debit,2); ?></th>
                                              <th style="text-align:right"><?php echo number_format($credit,2);?></th>
                                              <th style="text-align:right"><?php echo number_format($bal,2);?></th>

                                            </tr>
                                            <?php


                                        }
                                        

                                    }
                                    else{
                                      ?>
                                      <tr><th colspan="3">Student has no Payments for this semester.<?php echo $stud_course_code." ".$sem_id?></th></tr>
                                      <?php
                                    }
                                    ?>
                                    <?php 
                                    $sub_total_bal = $sub_total_debit-$sub_total_credit;
                                    $sub_total_bal = ($sub_total_bal<0)? 0:$sub_total_bal;

                                    ?>
                                    <tr >
                                      <th style="font-weight:bold;"><?php echo $fees_count." fee"; echo ($fees_count>1)? "s":""; ?></th>
                                      <th colspan="3" style=""></th>
                                      <th style="text-align:right;font-weight:bold;"><?php  echo number_format($sub_total_debit,2);?></th>
                                      <th style="text-align:right;font-weight:bold;"><?php  echo number_format($sub_total_credit,2);?></th>
                                      <th style="text-align:right;font-weight:bold;"><?php  echo number_format($sub_total_bal,2);?></th>

                                    </tr>

                                    <?php ?>
                                  </tbody>

                                </table>
                                <?php
                                $total_dabit  += $sub_total_debit;
                                $total_credit += $sub_total_credit;
                                $total_bal    += $sub_total_bal;
                            }
                        }
                        else{
                        ?>
                            <table class="table table-bordered" style="width:100%">

                              <thead>
                                <th >Trans Date</th>
                                <th>Trans Code</th>
                                <th>Ref No</th>
                                <th>Particulars</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Balance</th>
                              </thead>

                              <tbody>
                         
                                  <tr><th colspan="8">Student has no Payments for this semester.</th></tr>
                                

                                <tr >
                                  <th style="font-weight:bold;"></th>
                                  <th colspan="3" style=""></th>
                                  <th style="text-align:right;font-weight:bold;"><?php printf("%.2f",0);?></th>
                                  <th style="text-align:right;font-weight:bold;"><?php printf("%.2f",0);?></th>
                                  <th style="text-align:right;font-weight:bold;"><?php printf("%.2f",0);?></th>

                                </tr>

                             
                              </tbody>

                            </table>

                        <?php
                        }
                        ?>
                    </div>