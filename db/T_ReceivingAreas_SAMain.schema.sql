-- ----------------------------------------------------------
-- MDB Tools - A library for reading MS Access database files
-- Copyright (C) 2000-2011 Brian Bruns and others.
-- Files in libmdb are licensed under LGPL and the utilities under
-- the GPL, see COPYING.LIB and COPYING files respectively.
-- Check out http://mdbtools.sourceforge.net
-- ----------------------------------------------------------

-- That file uses encoding UTF-8

DROP TABLE IF EXISTS `T_ReceivingAreas_SAMain`;
CREATE TABLE `T_ReceivingAreas_SAMain`
 (
	`rcaArt58DateDesign`			DateTime, 
	`rcaBeginLife`			DateTime, 
	`rcaCode`			varchar, 
	`rcaDateArt54`			varchar, 
	`rcaDateArt58`			DateTime, 
	`rcaEndLife`			DateTime, 
	`rcaEnvDom`			varchar, 
	`rcaHyperlink`			varchar, 
	`rcaName`			varchar, 
	`rcaParameterM`			INTEGER, 
	`rcaParameterN`			INTEGER, 
	`rcaParameterOther`			INTEGER, 
	`rcaParameterP`			INTEGER, 
	`rcaRemarks`			TEXT, 
	`rcaSpZTyp`			varchar, 
	`rcaZtype`			varchar, 
	`ReceivingAreas_SAMainId`			INTEGER, 
	`repCode`			varchar
);


-- CREATE Relationships ...
