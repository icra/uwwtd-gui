--sandbox: arxiu per jugar amb les dades directament des de vim

--vim command: executar primer des de vim fent yy:@" o bé :execute getline(".")
--permete executar la comanda de SQL seleccionada amb vim amb la comanda "="
set equalprg=sqlite3\ -header\ -column\ db/Waterbase_UWWTD_v8.accdb.sqlite

--COMANDES SQL

--sql command
SELECT dcpCode,rptMStateKey,dcpName,dcpGeometry,dcpLatitude,dcpLongitude,uwwCode FROM T_DischargePoints LIMIT 5
--sql result
SELECT dcpCode,rptMStateKey,dcpName,dcpGeometry,dcpLatitude,dcpLongitude,uwwCode FROM T_DischargePoints LIMIT 5

--sql command
  SELECT
    dcp.dcpCode,
    dcp.dcpName,
    dcp.dcpState,
    dcp.dcpLatitude,
    dcp.dcpLongitude,
    dcp.dcpWaterBodyType,
    uww.uwwCode,
    uww.uwwName,
    uww.uwwState,
    uww.uwwLatitude,
    uww.uwwLongitude,
    uww.uwwPrimaryTreatment,
    uww.uwwSecondaryTreatment,
    uww.uwwOtherTreatment,
    uww.uwwNRemoval,
    uww.uwwPRemoval,
    uww.uwwUV,
    uww.uwwChlorination,
    uww.uwwOzonation,
    uww.uwwSandFiltration,
    uww.uwwMicroFiltration,
    uww.uwwOther,
    uww.uwwSpecification,
    agg.aggCode,
    agg.aggName,
    con.aucMethodPercEnteringUWWTP,
    agg.aggC1,
    agg.aggC2,
    agg.aggPercWithoutTreatment AS aggC3,
    agg.aggC1 + agg.aggC2 + agg.aggPercWithoutTreatment AS SUM_agg,
    con.aucPercEnteringUWWTP,
    con.aucPercC2T as aucPercTrucks,
    con.aucPercEnteringUWWTP + con.aucPercC2T           AS SUM_con
  FROM
    T_DischargePoints AS dcp,
    T_UWWTPs          AS uww,
    T_UWWTPAgglos     AS con,
    T_Agglomerations  AS agg
  WHERE
    dcp.uwwCode    = uww.uwwCode AND
    con.aucUwwCode = uww.uwwCode AND
    con.aucAggCode = agg.aggCode AND
    dcp.dcpState  != 0           AND
    uww.uwwState  != 0
  LIMIT 500
--sql result
