-- ----------------------------------------------------------
-- MDB Tools - A library for reading MS Access database files
-- Copyright (C) 2000-2011 Brian Bruns and others.
-- Files in libmdb are licensed under LGPL and the utilities under
-- the GPL, see COPYING.LIB and COPYING files respectively.
-- Check out http://mdbtools.sourceforge.net
-- ----------------------------------------------------------

-- That file uses encoding UTF-8

DROP TABLE IF EXISTS `T_Art17_FLAAgglomeration`;
CREATE TABLE `T_Art17_FLAAgglomeration`
 (
	`aggCode`			varchar, 
	`aggName`			varchar, 
	`Art17_FLAaggloID`			INTEGER, 
	`flaggComments`			TEXT, 
	`flaggEUFund`			INTEGER, 
	`flaggEUFundName`			TEXT, 
	`flaggExpecDateCompletion`			DateTime, 
	`flaggExpecDateStart`			DateTime, 
	`flaggExpecDateStartWork`			DateTime, 
	`flaggExpLoad`			INTEGER, 
	`flaggExpLoadColl`			INTEGER, 
	`flaggExpLoadIAS`			INTEGER, 
	`flaggInv`			INTEGER, 
	`flaggLoan`			INTEGER, 
	`flaggLoanName`			varchar, 
	`flaggMeasures`			TEXT, 
	`flaggOtherFund`			INTEGER, 
	`flaggOtherFundName`			TEXT, 
	`flaggReasons`			TEXT, 
	`flaggStatus`			varchar, 
	`flarepCode`			varchar
);


-- CREATE Relationships ...
