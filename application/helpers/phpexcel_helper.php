<?php

require_once APPPATH."third_party/PHPExcel.php";
require_once APPPATH."third_party/PHPExcel/IOFactory.php";

    if ( ! defined('BASEPATH'))
        exit('No direct script access allowed');

    if(!function_exists('exportShopRecru')){
        function exportShopRecru($data){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_recrutement_par_boutique.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE RECRUTEMENT PAR BOUTIQUE A DATE DU ".date('d-m-Y')), ';');
                $header=array("NUMDIST", "NOMS", "OBJECTIF", "REALISTATION","PERFORMANCE");
                fputcsv($output, $header, ';');

                $objDA = $objAG = $realDA = $realAG = 0;
                $totalObj = 0;
                foreach($data as $key=>$obj) {
                    $totalRecru = intval($obj->recru_std) + intval($obj->recru_bst);
                    $totalObj += $totalRecru;
                    if ($obj->type == PDV_AG) {
                        $objAG += $totalRecru;
                        $realAG += $obj->recruSum;
                    }
                    if ($obj->type != PDV_AG) {
                        $objDA += $totalRecru;
                        $realDA += $obj->recruSum;
                    }
                    $pcent =  ($totalRecru!=0)?round(($obj->recruSum / $totalRecru) * 100):0;
                    $result=array(
                        ($obj->numdist),
                        utf8_decode($obj->nom),
                        ($totalRecru),
                        ($obj->recruSum),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }
                /**
                 * Comparaison Réseau en propre et DA
                 */

                $header = array(
                    '',
                    utf8_decode('Réseau en propre'),
                    utf8_decode('Réseau des DA'),
                    utf8_decode('TOTAL')

                );
                fputcsv($output, array(), ';');
                fputcsv($output, $header, ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($objAG),
                    formatNumber($objDA),
                    formatNumber($totalObj)
                );
                fputcsv($output, $obj, ';');
                $real = array(
                    "REALISATIONS",
                    formatNumber($realAG),
                    formatNumber($realDA),
                    formatNumber($realAG+$realDA)
                );
                fputcsv($output, $real, ';');
                $pda =  ($totalObj!=0)?round(($realAG/$totalObj)*100):0;
                $pag =  ($totalObj!=0)?round(($realDA/$totalObj)*100):0;
                $pt =  ($totalObj!=0)?round((($realDA+$realAG)/$totalObj)*100):0;
                $pcent = array(
                    "PERFORMANCE",
                    $pda."%",
                    $pag."%",
                    $pt."%",
                );
                fputcsv($output, $pcent, ';');
                $rDA = $objDA-$realDA;
                $rAG = $objAG-$realAG;
                $tR = $rAG+ $rDA;
                $reste = array(
                    "RESTE A REALISER",
                    $rAG,
                    $rDA,
                    $tR
                );
                fputcsv($output, $reste, ';');
                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportShopReabo')){
        function exportShopReabo($data){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_reabonnement_par_boutique.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE REABONNEMENT PAR BOUTIQUE A DATE DU ".date('d-m-Y')), ';');
                $header=array("NUMDIST", "NOMS", "OBJECTIF", "REALISTATION","PERFORMANCE");
                fputcsv($output, $header, ';');

                $objDA = $objAG = $realDA = $realAG = 0;
                $totalObj = 0;
                foreach($data as $key=>$obj) {
                    $totalReabo = intval($obj->montant_reabo);
                    $totalObj += $totalReabo;
                    if ($obj->type == PDV_AG) {
                        $objAG += $totalReabo;
                        $realAG += $obj->reaboSum;
                    }
                    if ($obj->type != PDV_AG) {
                        $objDA += $totalReabo;
                        $realDA += $obj->reaboSum;
                    }
                    $pcent =  ($totalReabo!=0)?round(($obj->reaboSum / $totalReabo) * 100):0;
                    $result=array(
                        ($obj->numdist),
                        utf8_decode($obj->nom),
                        formatNumber($totalReabo),
                        (formatNumber($obj->reaboSum)),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }
                /**
                 * Comparaison Réseau en propre et DA
                 */

                $header = array(
                    '',
                    utf8_decode('Réseau en propre'),
                    utf8_decode('Réseau des DA'),
                    utf8_decode('TOTAL')

                );
                fputcsv($output, array(), ';');
                fputcsv($output, $header, ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($objAG),
                    formatNumber($objDA),
                    formatNumber($totalObj)
                );
                fputcsv($output, $obj, ';');
                $real = array(
                    "REALISATIONS",
                    formatNumber($realAG),
                    formatNumber($realDA),
                    formatNumber($realAG+$realDA)
                );
                fputcsv($output, $real, ';');
                $pda =  ($totalObj!=0)?round(($realAG/$totalObj)*100):0;
                $pag =  ($totalObj!=0)?round(($realDA/$totalObj)*100):0;
                $pt =  ($totalObj!=0)?round((($realDA+$realAG)/$totalObj)*100):0;
                $pcent = array(
                    "PERFORMANCE",
                    $pda."%",
                    $pag."%",
                    $pt."%",
                );
                fputcsv($output, $pcent, ';');
                $rDA = $objDA-$realDA;
                $rAG = $objAG-$realAG;
                $tR = $rAG+ $rDA;
                $reste = array(
                    "RESTE A REALISER",
                    formatNumber($rAG),
                    formatNumber($rDA),
                    formatNumber($tR)
                );
                fputcsv($output, $reste, ';');
                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportShopReaboDaily')){
    function exportShopReaboDaily($data,$btq){

        $objPHPExcel=new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
        $objPHPExcel->setActiveSheetIndex(0);

        if(!empty($data)){
            $file='Performances_reabonnement_boutique'.$btq->btqNom.'.csv';
            header('Content-Encoding: UTF-8');
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Type: application/force-download');
            header('Content-Transfer-Encoding: binary');
            header('Content-Disposition: attachment;filename='.$file);
            ob_clean();
            $output=fopen("php://output", "w");
            fputcsv($output, array("PERFORMANCE REABONNEMENT PDV $btq->btqNom A DATE DU ".date('d-m-Y')), ';');
            fputcsv($output, array("NUMDIST",$btq->numdist), ';');
            fputcsv($output, array(), ';');
            $header=array("DATE", "OBJECTIF_JOUR", "REALISTATION_JOUR","PERFORMANCE_JOUR");
            fputcsv($output, $header, ';');

            $treal = 0;
            $totalObj = 0;
            $totalObjDay = 0;
            foreach($data as $key=>$obj) {
                $totalObj = ($obj->montant_reabo) ;
                $treal +=  $obj->mtn_reabo;
                $totalObjDay += round($totalObj/(intval(moment()->endOf('month')->format('d'))));

                $jObj =  round($totalObj / intval(moment()->endOf("month")->format('d')));
                $pcent =  ($jObj!=0)?round(($obj->mtn_reabo / $jObj) * 100):100;
                $result=array(
                    moment($obj->jour)->format('d-m-Y'),
                    formatNumber($jObj),
                    formatNumber($obj->mtn_reabo),
                    ($pcent.'%'),
                );
                fputcsv($output, $result, ';');
            }

            /**
             * BILAN
             */


            fputcsv($output, array(), ';');
            fputcsv($output, array("","PERFORMANCES MTD","PERFORMANCE DTD"), ';');

            $obj = array(
                "OBJECTIFS",
                formatNumber($totalObj),
                formatNumber($totalObjDay),
            );
            fputcsv($output, $obj, ';');

            $real = array(
                "REALISATIONS",
                formatNumber($treal),
                formatNumber($treal),
            );
            fputcsv($output, $real, ';');

            $pm =  ($totalObj!=0)?round(($treal/$totalObj)*100):0;
            $pd = ($totalObjDay!=0)?round(($treal/$totalObjDay)*100):0;
            $pcent = array(
                "PERFORMANCE",
                $pm."%",
                $pd."%",
            );

            fputcsv($output, $pcent, ';');

            $rm = $totalObj-$treal;
            $rd = $totalObjDay-$treal;
            $reste = array(
                "RESTE A REALISER",
                formatNumber($rm),
                formatNumber($rd),
            );
            fputcsv($output, $reste, ';');

            fclose($output);
            return true;
        }
        else
            echo "Données vides";

    }
}

    if(!function_exists('exportSectorRecru')){
        function exportSectorRecru($data){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_recrutement_par_secteur.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE RECRUTEMENT PAR SECTEUR A DATE DU ".date('d-m-Y')), ';');
                $header=array("NOMS", "OBJECTIF", "REALISTATION","PERFORMANCE");
                fputcsv($output, $header, ';');

                $totalObj = 0;
                $totalReal = 0;
                foreach($data as $key=>$obj) {
                    $totalObj += $obj->obj;
                    $totalReal += $obj->real;
                    $pcent =  ($obj->obj!=0)?round(($obj->real / $obj->obj) * 100):0;
                    $result=array(
                        utf8_decode($obj->nom),
                        formatNumber($obj->obj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }
                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj)
                );
                fputcsv($output, $obj, ';');
                $real = array(
                    "REALISATIONS",
                    formatNumber($totalReal),
                );
                fputcsv($output, $real, ';');
                $p =  ($totalObj!=0)?round(($totalReal/$totalObj)*100):0;

                $pcent = array(
                    "PERFORMANCE",
                    $p."%"
                );
                fputcsv($output, $pcent, ';');

                $r = $totalObj-$totalReal;
                $reste = array(
                    "RESTE A REALISER",
                    formatNumber($r)
                );
                fputcsv($output, $reste, ';');
                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportSectorReabo')){
        function exportSectorReabo($data){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_reabonnement_par_secteur.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE REABONNEMENT PAR SECTEUR A DATE DU ".date('d-m-Y')), ';');
                $header=array("NOMS", "OBJECTIF", "REALISTATION","PERFORMANCE");
                fputcsv($output, $header, ';');

                $totalObj = 0;
                $totalReal = 0;
                foreach($data as $key=>$obj) {
                    $totalObj += $obj->obj;
                    $totalReal += $obj->real;
                    $pcent =  ($obj->obj!=0)?round(($obj->real / $obj->obj) * 100):0;
                    $result=array(
                        utf8_decode($obj->nom),
                        formatNumber($obj->obj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }
                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj)
                );
                fputcsv($output, $obj, ';');
                $real = array(
                    "REALISATIONS",
                    formatNumber($totalReal),
                );
                fputcsv($output, $real, ';');
                $p =  ($totalObj!=0)?round(($totalReal/$totalObj)*100):0;

                $pcent = array(
                    "PERFORMANCE",
                    $p."%"
                );
                fputcsv($output, $pcent, ';');

                $r = $totalObj-$totalReal;
                $reste = array(
                    "RESTE A REALISER",
                    formatNumber($r)
                );
                fputcsv($output, $reste, ';');
                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportCtrlRecru')){
        function exportCtrlRecru($data){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_recrutement_par_controleur.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE RECRUTEMENT PAR CONTROLEURS A DATE DU ".date('d-m-Y')), ';');
                $header=array("CUSER","NOMS", "OBJECTIF", "REALISTATION","PERFORMANCE");
                fputcsv($output, $header, ';');

                $totalObj = 0;
                $totalReal = 0;
                foreach($data as $key=>$obj) {
                    $totalObj += $obj->obj;
                    $totalReal += $obj->real;
                    $pcent =  ($obj->obj!=0)?round(($obj->real / $obj->obj) * 100):0;

                    $result=array(
                        $obj->cuser,
                        utf8_decode($obj->nom),
                        formatNumber($obj->obj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }
                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj)
                );
                fputcsv($output, $obj, ';');
                $real = array(
                    "REALISATIONS",
                    formatNumber($totalReal),
                );
                fputcsv($output, $real, ';');
                $p =  ($totalObj!=0)?round(($totalReal/$totalObj)*100):0;

                $pcent = array(
                    "PERFORMANCE",
                    $p."%"
                );
                fputcsv($output, $pcent, ';');

                $r = $totalObj-$totalReal;
                $reste = array(
                    "RESTE A REALISER",
                    formatNumber($r)
                );
                fputcsv($output, $reste, ';');
                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportCtrlReabo')){
        function exportCtrlReabo($data){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_reabonnement_par_controleur.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE REABONNEMENT PAR CONTROLEURS A DATE DU ".date('d-m-Y')), ';');
                $header=array("CUSER","NOMS", "OBJECTIF", "REALISTATION","PERFORMANCE");
                fputcsv($output, $header, ';');

                $totalObj = 0;
                $totalReal = 0;
                foreach($data as $key=>$obj) {
                    $totalObj += $obj->obj;
                    $totalReal += $obj->real;
                    $pcent =  ($obj->obj!=0)?round(($obj->real / $obj->obj) * 100):0;

                    $result=array(
                        $obj->cuser,
                        utf8_decode($obj->nom),
                        formatNumber($obj->obj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }
                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj)
                );
                fputcsv($output, $obj, ';');
                $real = array(
                    "REALISATIONS",
                    formatNumber($totalReal),
                );
                fputcsv($output, $real, ';');
                $p =  ($totalObj!=0)?round(($totalReal/$totalObj)*100):0;

                $pcent = array(
                    "PERFORMANCE",
                    $p."%"
                );
                fputcsv($output, $pcent, ';');

                $r = $totalObj-$totalReal;
                $reste = array(
                    "RESTE A REALISER",
                    formatNumber($r)
                );
                fputcsv($output, $reste, ';');
                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportCtrlRecruDaily')){
        function exportCtrlRecruDaily($data,$ctrl){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_recrutement_controleur'.$ctrl->nom.'.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE RECRUTEMENT ROLE_CONTROLEUR $ctrl->nom A DATE DU ".date('d-m-Y')), ';');
                $header=array("DATE", "OBJECTIF_JOUR", "REALISTATION_JOUR","PERFORMANCE_JOUR");
                fputcsv($output, $header, ';');

                $treal = 0;
                $totalObj = 0;
                $totalObjDay = 0;
                foreach($data as $key=>$obj) {
                    $totalObj = intval($obj->obj);
                    $treal +=  $obj->real;
                    $totalObjDay += round($totalObj/(intval(moment()->endOf('month')->format('d'))));

                    $jObj =  round($totalObj / intval(moment()->endOf("month")->format('d')));
                    $pcent =  ($jObj!=0)?round(($obj->real / $jObj) * 100):100;
                    $result=array(
                        moment($obj->jour)->format('d-m-Y'),
                        formatNumber($jObj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }

                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');
                fputcsv($output, array("","PERFORMANCES MTD","PERFORMANCE DTD"), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj),
                    formatNumber($totalObjDay),
                );

                fputcsv($output, $obj, ';');

                $real = array(
                    "REALISATIONS",
                    formatNumber($treal),
                    formatNumber($treal),
                );
                fputcsv($output, $real, ';');

                $pm =  ($totalObj!=0)?round(($treal/$totalObj)*100):0;
                $pd =  ($totalObjDay!=0)?round(($treal/$totalObjDay)*100):0;

                $pcent = array(
                    "PERFORMANCE",
                    $pm."%",
                    $pd."%"
                );
                fputcsv($output, $pcent, ';');

                $rm = $totalObj-$treal;
                $rd = $totalObjDay-$treal;

                $reste = array(
                    "PERFORMANCE",
                    $rm,
                    $rd
                );
                fputcsv($output, $reste, ';');

                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportCtrlReaboDaily')){
        function exportCtrlReaboDaily($data,$ctrl){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_reabonnement_controleur'.$ctrl->nom.'.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE REABONNEMENT ROLE_CONTROLEUR $ctrl->nom A DATE DU ".date('d-m-Y')), ';');
                $header=array("DATE", "OBJECTIF_JOUR", "REALISTATION_JOUR","PERFORMANCE_JOUR");
                fputcsv($output, $header, ';');

                $treal = 0;
                $totalObj = 0;
                $totalObjDay = 0;
                foreach($data as $key=>$obj) {
                    $totalObj = intval($obj->obj);
                    $treal +=  $obj->real;
                    $totalObjDay += round($totalObj/(intval(moment()->endOf('month')->format('d'))));

                    $jObj =  round($totalObj / intval(moment()->endOf("month")->format('d')));
                    $pcent =  ($jObj!=0)?round(($obj->real / $jObj) * 100):100;
                    $result=array(
                        moment($obj->jour)->format('d-m-Y'),
                        formatNumber($jObj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }

                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');
                fputcsv($output, array("","PERFORMANCES MTD","PERFORMANCE DTD"), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj),
                    formatNumber($totalObjDay),
                );

                fputcsv($output, $obj, ';');

                $real = array(
                    "REALISATIONS",
                    formatNumber($treal),
                    formatNumber($treal),
                );
                fputcsv($output, $real, ';');

                $pm =  ($totalObj!=0)?round(($treal/$totalObj)*100):0;
                $pd =  ($totalObjDay!=0)?round(($treal/$totalObjDay)*100):0;

                $pcent = array(
                    "PERFORMANCE",
                    $pm."%",
                    $pd."%"
                );
                fputcsv($output, $pcent, ';');

                $rm = $totalObj-$treal;
                $rd = $totalObjDay-$treal;

                $reste = array(
                    "PERFORMANCE",
                    formatNumber($rm),
                    formatNumber($rd)
                );
                fputcsv($output, $reste, ';');

                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportSectorRecruDaily')){
        function exportSectorRecruDaily($data,$secteur){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_recrutement_secteur'.$secteur->nom.'.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE RECRUTEMENT SECTEUR $secteur->nom A DATE DU ".date('d-m-Y')), ';');
                $header=array("DATE", "OBJECTIF_JOUR", "REALISTATION_JOUR","PERFORMANCE_JOUR");
                fputcsv($output, $header, ';');

                $treal = 0;
                $totalObj = 0;$totalObjDay = 0;
                foreach($data as $key=>$obj) {
                    $totalObj = intval($obj->obj);
                    $treal +=  $obj->real;
                    $totalObjDay += round($totalObj/(intval(moment()->endOf('month')->format('d'))));

                    $jObj =  round($totalObj / intval(moment()->endOf("month")->format('d')));
                    $pcent =  ($jObj!=0)?round(($obj->real / $jObj) * 100):100;
                    $result=array(
                        moment($obj->jour)->format('d-m-Y'),
                        formatNumber($jObj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }

                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');
                fputcsv($output, array("","PERFORMANCES MTD","PERFORMANCE DTD"), ';');
                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj),
                    formatNumber($totalObjDay)
                );

                fputcsv($output, $obj, ';');

                $real = array(
                    "REALISATIONS",
                    formatNumber($treal),
                    formatNumber($treal),
                );
                fputcsv($output, $real, ';');

                $pm =  ($totalObj!=0)?round(($treal/$totalObj)*100):0;
                $pd =  ($totalObjDay!=0)?round(($treal/$totalObjDay)*100):0;


                $pcent = array(
                    "PERFORMANCE",
                    $pm."%",
                    $pd."%"
                );
                fputcsv($output, $pcent, ';');

                $rm = $totalObj-$treal;
                $rd = $totalObjDay-$treal;
                $reste = array(
                    "RESTE A REALISER",
                    $rm,
                    $rd
                );
                fputcsv($output, $reste, ';');

                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportSectorReaboDaily')){
        function exportSectorReaboDaily($data,$secteur){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_reabonnement_secteur'.$secteur->nom.'.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE REABONNEMENT SECTEUR $secteur->nom A DATE DU ".date('d-m-Y')), ';');
                $header=array("DATE", "OBJECTIF_JOUR", "REALISTATION_JOUR","PERFORMANCE_JOUR");
                fputcsv($output, $header, ';');

                $treal = 0;
                $totalObj = 0;$totalObjDay = 0;
                foreach($data as $key=>$obj) {
                    $totalObj = intval($obj->obj);
                    $treal +=  $obj->real;
                    $totalObjDay += round($totalObj/(intval(moment()->endOf('month')->format('d'))));

                    $jObj =  round($totalObj / intval(moment()->endOf("month")->format('d')));
                    $pcent =  ($jObj!=0)?round(($obj->real / $jObj) * 100):100;
                    $result=array(
                        moment($obj->jour)->format('d-m-Y'),
                        formatNumber($jObj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }

                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');
                fputcsv($output, array("","PERFORMANCES MTD","PERFORMANCE DTD"), ';');
                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj),
                    formatNumber($totalObjDay)
                );

                fputcsv($output, $obj, ';');

                $real = array(
                    "REALISATIONS",
                    formatNumber($treal),
                    formatNumber($treal),
                );
                fputcsv($output, $real, ';');

                $pm =  ($totalObj!=0)?round(($treal/$totalObj)*100):0;
                $pd =  ($totalObjDay!=0)?round(($treal/$totalObjDay)*100):0;


                $pcent = array(
                    "PERFORMANCE",
                    $pm."%",
                    $pd."%"
                );
                fputcsv($output, $pcent, ';');

                $rm = $totalObj-$treal;
                $rd = $totalObjDay-$treal;
                $reste = array(
                    "RESTE A REALISER",
                    formatNumber($rm),
                    formatNumber($rd)
                );
                fputcsv($output, $reste, ';');

                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportShopRecruDaily')){
        function exportShopRecruDaily($data,$btq){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_recrutement_boutique'.$btq->btqNom.'.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE RECRUTEMENT PDV $btq->btqNom A DATE DU ".date('d-m-Y')), ';');
                fputcsv($output, array("NUMDIST",$btq->numdist), ';');
                fputcsv($output, array(), ';');
                $header=array("DATE", "OBJECTIF_JOUR", "REALISTATION_JOUR","PERFORMANCE_JOUR");
                fputcsv($output, $header, ';');

                $treal = 0;
                $totalObj = 0;
                $totalObjDay = 0;
                foreach($data as $key=>$obj) {
                    $totalObj = intval($obj->recru_std) + intval($obj->recru_bst);
                    $treal +=  $obj->nbr;
                    $totalObjDay += round($totalObj/(intval(moment()->endOf('month')->format('d'))));

                    $jObj =  round($totalObj / intval(moment()->endOf("month")->format('d')));
                    $pcent =  ($jObj!=0)?round(($obj->nbr / $jObj) * 100):100;
                    $result=array(
                        moment($obj->jour)->format('d-m-Y'),
                        formatNumber($jObj),
                        formatNumber($obj->nbr),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }

                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');
                fputcsv($output, array("","PERFORMANCES MTD","PERFORMANCE DTD"), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj),
                    formatNumber($totalObjDay),
                );
                fputcsv($output, $obj, ';');

                $real = array(
                    "REALISATIONS",
                    formatNumber($treal),
                    formatNumber($treal),
                );
                fputcsv($output, $real, ';');

                $pm =  ($totalObj!=0)?round(($treal/$totalObj)*100):0;
                $pd = ($totalObjDay!=0)?round(($treal/$totalObjDay)*100):0;
                $pcent = array(
                    "PERFORMANCE",
                    $pm."%",
                    $pd."%",
                );

                fputcsv($output, $pcent, ';');

                $rm = $totalObj-$treal;
                $rd = $totalObjDay-$treal;
                $reste = array(
                    "RESTE A REALISER",
                    $rm,
                    $rd,
                );
                fputcsv($output, $reste, ';');

                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if(!function_exists('exportRecruGlobal')){
        function exportRecruGlobal($data){

            $objPHPExcel=new PHPExcel();
            $objPHPExcel->getProperties()->setCreator("GROUPE LIN");
            $objPHPExcel->setActiveSheetIndex(0);

            if(!empty($data)){
                $file='Performances_recrutement_global.csv';
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/csv; charset=utf-8');
                header('Content-Type: application/force-download');
                header('Content-Transfer-Encoding: binary');
                header('Content-Disposition: attachment;filename='.$file);
                ob_clean();
                $output=fopen("php://output", "w");
                fputcsv($output, array("PERFORMANCE RECRUTEMENT GLOBAL A DATE DU ".date('d-m-Y')), ';');
                fputcsv($output, array(), ';');
                $header=array("DATE", "OBJECTIF_JOUR", "REALISTATION_JOUR","PERFORMANCE_JOUR");
                fputcsv($output, $header, ';');

                $treal = 0;
                $totalObj = 0;
                $totalObjDay = 0;
                foreach($data as $key=>$obj) {
                    $totalObj = intval($obj->obj);
                    $treal +=  $obj->real;
                    $totalObjDay = round($totalObj/(intval(moment()->endOf('month')->format('d'))));


                    $jObj =  round($totalObj / intval(moment()->endOf("month")->format('d')));
                    $pcent =  ($jObj!=0)?round(($obj->real / $jObj) * 100):100;
                    $result=array(
                        moment($obj->jour)->format('d-m-Y'),
                        formatNumber($jObj),
                        formatNumber($obj->real),
                        ($pcent.'%'),
                    );
                    fputcsv($output, $result, ';');
                }

                /**
                 * BILAN
                 */


                fputcsv($output, array(), ';');
                fputcsv($output, array("","PERFORMANCES MTD","PERFORMANCE DTD"), ';');

                $obj = array(
                    "OBJECTIFS",
                    formatNumber($totalObj),
                    formatNumber($totalObjDay),
                );

                fputcsv($output, $obj, ';');

                $real = array(
                    "REALISATIONS",
                    formatNumber($treal),
                    formatNumber($treal),
                );
                fputcsv($output, $real, ';');

                $pm =  ($totalObj!=0)?round(($treal/$totalObj)*100):0;
                $pd =  ($totalObjDay!=0)?round(($treal/$totalObjDay)*100):0;
                $pcent = array(
                    "PERFORMANCE",
                    $pm."%",
                    $pd."%"
                );
                fputcsv($output, $pcent, ';');

                $rm = $totalObj-$treal;
                $rd = $totalObjDay-$treal;
                $reste = array(
                    "RESTE A REALISER",
                    $rm,
                    $rd,
                );
                fputcsv($output, $reste, ';');

                fclose($output);
                return true;
            }
            else
                echo "Données vides";

        }
    }

    if ( ! function_exists('export')) {
        function export($data, $type)
        {
            //var_dump($data, $type); die();
            if (!in_array($type, array('certificate', 'report', 'attestation')) or empty($data))
            {
                return false;
            }
            else
            {
                $objPHPExcel=new PHPExcel();
                $objPHPExcel->getProperties()->setCreator("MULTISOFT ACADEMY S.A.R.L");
                $objPHPExcel->setActiveSheetIndex(0);

                if ($type=="certificate")
                {
                    $file='Certificates-'.$data->promotion.'-'.date('YmdHis').'.csv';
                    header('Content-Encoding: UTF-8');
                    header('Content-Type: text/csv; charset=utf-8');
                    header('Content-Type: application/force-download');
                    header('Content-Transfer-Encoding: binary');
                    header('Content-Disposition: attachment;filename='.$file);
                    ob_clean();
                    $output=fopen("php://output", "w");

                    $header=array("SEXE", "NOMS", "DNAISS", "LNAISS","MATRICULE", "VAGUE",  "CODEF","DUREE");
                    fputcsv($output, $header, ';');

                    $row=1;

                    //var_dump($data);die();
                    foreach ($data->certs as $crt)
                    {
                        $result=array(
                            utf8_decode($crt->sexe),
                            utf8_decode($crt->lastname)." ".utf8_decode($crt->firstname),
                            utf8_decode($crt->birth_date),
                            utf8_decode($crt->birth_place),
                            utf8_decode($crt->number_id),
                            utf8_decode($data->promotion),
                            utf8_decode($crt->codeMention),
                            utf8_decode($crt->duration)
                        );
                        fputcsv($output, $result, ';');
                    }
                    fclose($output);
                    return true;

                }
            }
        }
    }

    if(!function_exists('xlsToCsv')){
        function xlsToCsv($infile,$outFileDirectory,$outFilePrefixe,$count=1){


            $inputFileType = PHPExcel_IOFactory::identify($infile);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objReader->setReadDataOnly(true);
            $sheetNames=array();
            try{

                $objPHPExcel = $objReader->load($infile);
                $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
                $writer->setDelimiter(";");
                $writer->setEnclosure("");
                if($count!=1){
                    foreach ($objPHPExcel->getWorksheetIterator() as $workSheetIndex => $worksheet)
                    {
                        $objPHPExcel->setActiveSheetIndex($workSheetIndex);
                        $writer->setSheetIndex($workSheetIndex);
                        $writer->save("./assets/documents/$outFileDirectory/" . $outFilePrefixe ."_" . $worksheet->getTitle() . ".csv");
                        $sheetNames[] = $outFilePrefixe ."_" . $worksheet->getTitle() . ".csv";

                        if($count!=1)
                            return $sheetNames;

                        return $sheetNames[0];
                    }
                }
                else{
                    $objPHPExcel->setActiveSheetIndex(0);
                    $writer->setSheetIndex(0);
                    $writer->save("./assets/documents/$outFileDirectory/" . $outFilePrefixe. ".csv");
                    return $outFilePrefixe.".csv";
                }

            }
            catch (Exception $e){
                echo $e->getMessage();
            }
        }
    }
?>