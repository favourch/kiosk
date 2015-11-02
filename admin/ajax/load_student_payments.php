
<?php
include "../../db/db.php";
include "../../actions/misc_functions.php";

$student_id = $_GET['student_id'];
$sem_id = $_GET['sem_id'];
?>
                                <?php

                                $sub_total_debit = 0;
                                $sub_total_credit = 0;
                                $sub_total_bal = 0;
                                ?>
                       
                                <h4><?php echo sem_name($sem_id);?></h4>
                                <table class="table table-bordered" style="width:100%;font-weight:normal;">

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
                                                                  ") or die(trigger_error(mysql_error()));

                                    if(mysql_num_rows($query_payments)>0){
                                        
                                        while($row_payments = mysql_fetch_assoc($query_payments)){
                                            $fees_count++;
                                            $trans_date = $row_payments['trans_date'];
                                            $trans_code = $row_payments['trans_code'];
                                            $ref_no = $row_payments['ref_no'];
                                            $particulars = $row_payments['particulars'];
                                            $sub_total_debit += $debit = $row_payments['debit'];
                                            $sub_total_credit += $credit = $row_payments['credit'];
                                            $sub_total_bal += $bal = $row_payments['bal'];
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
                                      <tr><th colspan="7">Student has no Payments for this semester.</th></tr>
                                      <?php
                                    }
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
                                ?>