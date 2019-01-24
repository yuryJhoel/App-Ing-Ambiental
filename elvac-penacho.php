<?php



// Formula de Holland
    // Elevacion del penacho
    function elevacion($vs,$d,$u,$patm,$tscont,$tamb,$fcorr){
        $a = ($vs * $d)/$u;
        $b = 2.68*pow(10, -3);
        $c = $patm*$d*(($tscont-$tamb)/$tscont);

        switch ($fcorr) {
            case 'A':
                $fcorr =1.15;
                break;
            case 'B':
                $fcorr =1.15;
                break;
            case 'C':
                $fcorr =1.10;
                break;
            case 'D':
                $fcorr =1.00;
                break;
            case 'E':
                $fcorr =0.85;
                break;
            default:
                $fcorr =0.85;
                break;
        }
        return $a*(1.5 +$b*$c)*$fcorr;
    }
    // Concentraion del contaminante

    function concentracion($emigs, $distz, $disty, $hchim, $velvt, $sigmy, $sigmz, $elev){

        $a = $emigs/(2*M_PI*$velvt*$sigmy*$sigmz);
        $e1 = -pow($disty,2)/(2*pow($sigmy,2));
        $b = pow(M_E, $e1);
        $dif2 = $distz-($hchim+$elev);
        $e2 = -pow($dif2,2)/(2*pow($sigmz,2));
        $c = pow(M_E, $e2);
        return $a*$b*$c;
    }
    function concent_con_reflexion($emigs, $distz, $disty, $hchim, $velvt, $sigmy, $sigmz, $elev){
        $a = $emigs/(2*M_PI*$velvt*$sigmy*$sigmz);
        $e1 = -pow($disty,2)/(2*pow($sigmy,2));
        $b = pow(M_E, $e1);

        $dif2 = $distz-($hchim+$elev);
        $e2 = -pow($dif2,2)/(2*pow($sigmz,2));
        $c = pow(M_E, $e2);

        $dif3 = $distz+($hchim+$elev);
        $e3 = -pow($dif3,2)/(2*pow($sigmz,2));
        $d = pow(M_E, $e3);
        return $a*$b*($c+$d);
    }

    function mas_afectadosz0($emigs, $disty, $hchim, $velvt, $sigmy, $sigmz, $elev){
        $a = $emigs/(M_PI*$velvt*$sigmy*$sigmz);
        $e1 = -pow($disty,2)/(2*pow($sigmy,2));
        $b = pow(M_E, $e1);
        $e2 = -pow(($hchim+$elev),2)/(2*pow($sigmz,2));
        $c = pow(M_E, $e2);
        return $a*$b*$c;
    }

    function mas_afectadosz0y0($emigs, $hchim, $velvt, $sigmy, $sigmz, $elev){
        $a = $emigs/(M_PI*$velvt*$sigmy*$sigmz);

        $e2 = -pow(($elev + $hchim),2)/(2*pow($sigmz,2));
        $b = pow(M_E, $e2);

        return $a*$b;
    }

    function desvihoriz($a,$dist,$b=0.894){
        return $a*pow($dist,$b);
    }
    function desvivert($c, $dist, $d , $f){
        return $c*pow($dist, $d)+$f;
    }
?>