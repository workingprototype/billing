<?php
$db = new mysqli(SQL_HOST, SQL_USERNAME, SQL_PASSWORD , SQL_DBN);

header('Content-Type: text/csv; charset=utf-8');
if($request[1]=='customer'){
    header('Content-Disposition: attachment; filename=customer_report.csv');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('Customer Name', 'Contact', 'Purcahses', 'Paid', 'Reward', 'Payment Pending'));
    $sql="SELECT * FROM users";
    $result = $db->query($sql);
    $i=1;
    while($row=$result->fetch_assoc()){
        $id=$row['id'];
        $sq="SELECT * FROM sales WHERE customer='$id' GROUP BY invoice";
        $resultc=$db->query($sq);
        $purchases=0;
        while ($rowc=$resultc->fetch_assoc()){
            $purchases++;
        }

        $sq="SELECT * FROM paymentdue WHERE customer='$id'";
        $resultc=$db->query($sq);
        $paymentdue=0;
        while ($rowc=$resultc->fetch_assoc()){
            $paymentdue+=$rowc['dueamount'];
        }
        $csv=[$row['name'],$row['contactno'],$purchases,"Not completed",$row['rewards'],$paymentdue];
        fputcsv($output,$csv);
    }
}
if($request[1]=='sales'){
    header('Content-Disposition: attachment; filename=customer_report.csv');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    // output the column headings
    fputcsv($output, array('Date', 'Invoice Number', 'Customer', 'Customer Contact', 'Total Amount', 'GST'));
    $to= time();
    $from=0;
    $keys="";
    $sql="SELECT * FROM sales 
    WHERE (timestamp BETWEEN '$from'  AND '$to') AND (invoice LIKE '%$keys%') 
    GROUP BY invoice  LIMIT 50";
    $result = $db->query($sql);
    $i=1;
    while($row=$result->fetch_assoc()){
        $date = date("d-m-Y",$row['timestamp']);
        $id=$row['customer'];
        $sq="SELECT * FROM users WHERE id='$id'";
        $res=$db->query($sq)->fetch_assoc();
        $customer = $res['name'];
        $customerno = $res['contactno'];
        $csv=[$date,$row['invoice'],$customer,$customerno,$row['total'],$row['gst']];
        fputcsv($output,$csv);
    }
}

?>