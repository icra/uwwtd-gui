<?php
  include 'load_db.php';
  echo    'WIP';
?>
Table_T_Agglomerations
  1. duplicated agglomerations
    "SELECT * FROM T_Agglomerations GROUP BY aggCode HAVING COUNT(aggCode)>1"

  2. agglomerations with latitude or longitude NULL
    "SELECT * FROM T_Agglomerations WHERE aggLongitude is 0 OR aggLongitude is NULL OR aggLatitude is 0 OR aggLatitude is NULL"

  3. agglomerations not in T_UWWTPAgglos and not in T_UWWTPS
    "
      SELECT *,aggC1+aggC2 as c1_plus_c2 FROM T_Agglomerations 
        WHERE aggState=1 AND 
        aggCode NOT IN (SELECT aucAggCode FROM T_UWWTPAgglos) AND
        aggCode NOT IN (SELECT aggCode    FROM T_UWWTPS) AND
        c1_plus_c2 != 100
    " 
    
Table_T_UWWTPS
  1. duplicated uwwtps
    "SELECT * FROM T_UWWTPS GROUP BY uwwCode HAVING COUNT(uwwCode)>1"

  2. uwwtps with latitude or longitude NULL
    "SELECT * FROM T_UWWTPS WHERE uwwLongitude is 0 OR uwwLongitude is NULL OR uwwLatitude is 0 OR uwwLatitude is NULL"

  3. uwwtps not in T_UWWTPS_emission_load
    "SELECT * FROM T_UWWTPS WHERE uwwCode NOT IN (SELECT uwwCode FROM T_UWWTPS_emission_load)"

  4. uwwtps not in T_UWWTPAgglos
    "SELECT * FROM T_UWWTPS WHERE uwwState=1 AND uwwCode NOT IN (SELECT aucUwwCode FROM T_UWWTPAgglos)"

  5. uwwtps not in T_DischargePoints
    "SELECT * FROM T_UWWTPS WHERE uwwState=1 AND uwwCode NOT IN (SELECT uwwCode FROM T_DischargePoints)"

  6. uwwtps with multiple entries in T_DischargePoints
    "SELECT * FROM T_UWWTPS WHERE uwwCode IN ( SELECT uwwCode FROM T_DischargePoints WHERE dcpState=1 GROUP BY uwwCode HAVING COUNT(uwwCode)>1 )"

Table_T_DischargePoints
  1. duplicated discharge points
    "SELECT * FROM T_DischargePoints GROUP BY dcpCode HAVING COUNT(dcpCode)>1"

  2. discharge points with latitude or longitude NULL
    "SELECT * FROM T_DischargePoints WHERE dcpLongitude is 0 OR dcpLongitude is NULL OR dcpLatitude is 0 OR dcpLatitude is NULL"

  3. discharge points where uwwCode is not in T_UWWTPS
    "SELECT * FROM T_DischargePoints WHERE dcpState=1 AND uwwCode NOT IN (SELECT uwwCode FROM T_UWWTPS)"

Table_T_UWWTPS_emission_load
  1. emissions with uwwCode duplicated
    "SELECT * FROM T_UWWTPS_emission_load GROUP BY uwwCode HAVING COUNT(uwwCode)>1"

  2. emissions with uwwCode NULL
    "SELECT * FROM T_UWWTPS_emission_load WHERE uwwCode is NULL"

  3. emissions with uwwCode not in T_UWWTPS
    "SELECT * FROM T_UWWTPS_emission_load WHERE uwwCode NOT IN (SELECT uwwCode FROM T_UWWTPS)"

Table_T_UWWTPAgglos
  1. connections with uwwCode or aggCode NULL
    "SELECT * FROM T_UWWTPAgglos WHERE aucUwwCode is NULL or aucAggCode is NULL"

  2. connections with aggCode not in T_Agglomerations
    "SELECT * FROM T_UWWTPAgglos WHERE aucAggCode NOT IN (SELECT aggCode FROM T_Agglomerations)"

  3. connections with uwwCode not in T_UWWTPS
    "SELECT * FROM T_UWWTPAgglos WHERE aucUwwCode NOT IN (SELECT uwwCode FROM T_UWWTPS)"

Percentage_PE
  1. check that PE sum is 100%
    "SELECT *, aggC1 AS c1, aggC2 AS c2, aggPercWithoutTreatment AS c3, aucPercEnteringUWWTP AS c4, aucPercC2T AS c5 FROM T_Agglomerations AS agg, T_UWWTPAgglos AS con WHERE agg.aggCode = con.aucAggCode"
