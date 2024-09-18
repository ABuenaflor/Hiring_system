<?php
if(isset($_POST['submit_basic_ed_sr'])){
    $deg_earned = $_POST['deg_earned'];
    $baccal = $_POST['bacc'];
    $bse = $_POST['bse'];
    $bs = $_POST['bs'];
    $cs_exam = $_POST['cs_exam'];
    $prof_growth = $_POST['prof_growth'];
    $adv_training = $_POST['adv_training'];
    $ma = $_POST['ma'];
    $ma_so = $_POST['ma_so'];
    $seminars = $_POST['seminars'];
    $sem_intrntl = $_POST['sem_intrntl'];
    $sem_ntnl = $_POST['sem_ntnl'];
    $sem_rgnl = $_POST['sem_rgnl'];
    $sem_local = $_POST['sem_local'];
    $as_speaker = $_POST['as_speaker'];
    $trainer = $_POST['trainer'];
    $resource_spkr = $_POST['resource_spkr'];
    $faci = $_POST['faci'];
    $comp_cert = $_POST['comp_cert'];
    $teach_exp = $_POST['teach_exp'];
    $stat_emp = $_POST['stat_emp'];
    $fulltime = $_POST['fulltime'];
    $parttime = $_POST['parttime'];
    $onetotwo = $_POST['onetotwo'];
    $threetofour = $_POST['threetofour'];
    $outside = $_POST['outside'];
    $facult_perf = $_POST['facult_perf'];
    $mode = $_POST['mode'];
    $very_satisf = $_POST['very_satisf'];
    $satisfy = $_POST['satisfy'];
    $comm_serv = $_POST['comm_serv'];
    $prof_org = $_POST['prof_org'];
    $prof_intrntnl = $_POST['prof_intrntnl'];
    $prof_ntnl = $_POST['prof_ntnl'];
    $prof_rgnl = $_POST['prof_rgnl'];
    $prof_div = $_POST['prof_div'];
    $services_rend = $_POST['services_rend'];
    $coach = $_POST['coach'];
    $area_chair = $_POST['area_chair'];
    $comm_mem = $_POST['comm_mem'];
    $chair_other = $_POST['chair_other'];
    $chair_otherSch = $_POST['chair_otherSch'];
    $mem_acad = $_POST['mem_acad'];
    $awards = $_POST['awards'];
    $awards_intrntnl = $_POST['awards_intrntnl'];
    $awards_natnl = $_POST['awards_natnl'];
    $awards_rgnl = $_POST['awards_rgnl'];
    $awards_div = $_POST['awards_div'];
    $research_prod = $_POST['research_prod'];
    $research_work = $_POST['research_work'];
    $main_research = $_POST['main_research'];
    $co_research = $_POST['co_research'];
    $enum = $_POST['enum'];
    $research_lead = $_POST['research_lead'];
    $research_out = $_POST['research_out'];
    $addtnl_five = $_POST['addtnl_five'];
    $pts = $_POST['pts'];
    $overall_crit = $_POST['overall_crit'];
    $grand_total = $_POST['grand_total'];

    $update_query = "INSERT INTO basic_ed_sr (deg_earned,bacc,bse,bs,cs_exam,prof_growth,adv_training,ma,ma_so,seminars,sem_intrntl,sem_ntnl,sem_rgnl,sem_local,
    as_speaker,trainer,resource_spkr,faci,comp_cert,teach_exp,stat_emp,fulltime,parttime,onetotwo,threetofour,outside,facult_perf,mode,very_satisf,satisfy,comm_serv,
    prof_org,prof_intrntnl,prof_ntnl,prof_rgnl,prof_div,services_rend,coach,area_chair,comm_mem,chair_other,chair_otherSch,mem_acad,awards,awards_intrntnl,awards_natnl,
    awards_rgnl,awards_div,research_prod,research_work,main_research,co_research,enum,research_lead,research_out,addtnl_five,pts,overall_crit,grand_total) VALUES ('$deg_earned',
    '$baccal','$bse','$bs','$cs_exam','$prof_growth','$adv_training','$ma','$ma_so','$seminars','$sem_intrntl','$sem_ntnl','$sem_rgnl','$sem_local','$as_speaker','$trainer','$resource_spkr',
    '$faci','$comp_cert','$teach_exp','$stat_emp','$fulltime','$parttime','$onetotwo','$threetofour','$outside','$facult_perf','$mode','$very_satisf','$satisfy','$comm_serv','$prof_org','$prof_intrntnl',
    '$prof_ntnl','$prof_rgnl','$prof_div','$services_rend','$coach','$area_chair','$comm_mem','$chair_other','$chair_otherSch','$mem_acad','$awards','$awards_intrntnl','$awards_natnl','$awards_rgnl','$awards_div','$research_prod',
    '$research_work','$main_research','$co_research','$enum','$research_lead','$research_out','$addtnl_five','$pts','$overall_crit','$grand_total')";

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run){
        
        // Set message to session before redirecting
        echo "<script>alert('Self Rating Submitted Succesfully');</script>"; 
        /* $_SESSION['message'] = "Added Successfully"; */
        header('location: emp_sr.php');
        exit();
    } else {
        // Set error message to session before redirecting
        $_SESSION['message'] = "Something went wrong";
        header('location: emp_sr.php');
        exit();
    }

}
?>