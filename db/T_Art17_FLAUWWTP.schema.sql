-- ----------------------------------------------------------
-- MDB Tools - A library for reading MS Access database files
-- Copyright (C) 2000-2011 Brian Bruns and others.
-- Files in libmdb are licensed under LGPL and the utilities under
-- the GPL, see COPYING.LIB and COPYING files respectively.
-- Check out http://mdbtools.sourceforge.net
-- ----------------------------------------------------------

-- That file uses encoding UTF-8

DROP TABLE IF EXISTS `T_Art17_FLAUWWTP`;
CREATE TABLE `T_Art17_FLAUWWTP`
 (
	`Art17_FLAUWWTPID`			INTEGER, 
	`flarepCode`			varchar, 
	`flatpComments`			TEXT, 
	`flatpEUFund`			INTEGER, 
	`flatpEUFundName`			TEXT, 
	`flatpExpCapacity`			INTEGER, 
	`flatpExpecDateCompletion`			DateTime, 
	`flatpExpecDateCompletion_original`			varchar, 
	`flatpExpecDatePerformance`			DateTime, 
	`flatpExpecDatePerformance_original`			varchar, 
	`flatpExpecDateStart`			DateTime, 
	`flatpExpecDateStart_original`			varchar, 
	`flatpExpecDateStartWork`			DateTime, 
	`flatpExpecDateStartWork_original`			varchar, 
	`flatpExpecTreatment`			varchar, 
	`flatpExpLoad`			INTEGER, 
	`flatpExpLoadTruck`			INTEGER, 
	`flatpInv`			INTEGER, 
	`flatpLoan`			INTEGER, 
	`flatpLoanName`			TEXT, 
	`flatpMeasures`			TEXT, 
	`flatpOtherFund`			INTEGER, 
	`flatpOtherFundName`			TEXT, 
	`flatpReasons`			TEXT, 
	`flatpStatus`			varchar, 
	`uwwCode`			varchar, 
	`uwwName`			varchar
);


-- CREATE Relationships ...
