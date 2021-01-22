-- ----------------------------------------------------------
-- MDB Tools - A library for reading MS Access database files
-- Copyright (C) 2000-2011 Brian Bruns and others.
-- Files in libmdb are licensed under LGPL and the utilities under
-- the GPL, see COPYING.LIB and COPYING files respectively.
-- Check out http://mdbtools.sourceforge.net
-- ----------------------------------------------------------

-- That file uses encoding UTF-8

DROP TABLE IF EXISTS `T_ReceivingAreas_LSA`;
CREATE TABLE `T_ReceivingAreas_LSA`
 (
	`rca61DateDesignation`			DateTime, 
	`rcaAbsenceRisk`			varchar, 
	`rcaBeginLife`			DateTime, 
	`rcaCode`			varchar, 
	`rcaEndLife`			DateTime, 
	`rcaEnvDom`			varchar, 
	`rcaHydraulic`			INTEGER, 
	`rcaHydrology`			INTEGER, 
	`rcaHyperlink`			varchar, 
	`rcalsaRemarks`			TEXT, 
	`rcaMorphology`			INTEGER, 
	`rcaName`			varchar, 
	`rcaZtype`			varchar, 
	`ReceivingAreas_LSAId`			INTEGER, 
	`repCode`			varchar
);


-- CREATE Relationships ...
