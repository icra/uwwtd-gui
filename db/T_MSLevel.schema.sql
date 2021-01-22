-- ----------------------------------------------------------
-- MDB Tools - A library for reading MS Access database files
-- Copyright (C) 2000-2011 Brian Bruns and others.
-- Files in libmdb are licensed under LGPL and the utilities under
-- the GPL, see COPYING.LIB and COPYING files respectively.
-- Check out http://mdbtools.sourceforge.net
-- ----------------------------------------------------------

-- That file uses encoding UTF-8

DROP TABLE IF EXISTS `T_MSLevel`;
CREATE TABLE `T_MSLevel`
 (
	`mslDischargeOthers`			INTEGER, 
	`mslDischargePipelines`			INTEGER, 
	`mslDischargeShips`			INTEGER, 
	`mslDisposalIncineration`			INTEGER, 
	`mslDisposalLandfill`			INTEGER, 
	`mslDisposalOthers`			INTEGER, 
	`msLevelID`			INTEGER, 
	`mslMS`			INTEGER, 
	`mslRemarks`			TEXT, 
	`mslReuseOthers`			INTEGER, 
	`mslReuseSoilAgriculture`			INTEGER, 
	`mslSludgeProduction`			INTEGER, 
	`mslWWReuseAgri`			INTEGER, 
	`mslWWReuseExplain`			varchar, 
	`mslWWReuseInd`			INTEGER, 
	`mslWWReuseOther`			INTEGER, 
	`mslWWReusePerc`			INTEGER, 
	`repCode`			varchar, 
	`rptMStateKey`			varchar
);


-- CREATE Relationships ...
