<?php

namespace App\Utils;

/**
 * This is a dictionary containing the most common abbreviations in English.
 */
final class Abbreviations
{
    public const DOTTED = [
        ' absol. ',	//absolute(ly)
        ' Absol. ', 	//absolute
        ' Abst. ', 	//abstract(s)
        ' abstr. ',	//abstract
        ' Acad. ', 	//academia, academy, academic(al)
        ' acc. ',  	//according (to)
        ' Acc. ', 	//account(s)
        ' Accomm. ',  //accommodation
        ' Accompl. ',	//accomplished
        ' Accs. ',	//accounts
        ' Acct. ',	//account
        ' ad. ',  	//adaptation of
        ' addr. ',    //address
        ' Afr. ',	    //Africa(n)
        ' Alph. ',	//alphabet, alphabetical
        ' Ann. ', 	//annual
        ' Anniv. ',   //anniversary
        ' Annot. ',	//annotation
        ' App. ',     //appendix
        ' Apr. ',     //April
        ' art. ',     //article
        ' Aug. ',     //August
        ' auth. ',    //author
        ' bef. ',     //before
        ' Biog. ',	//biography
        ' Bp. ',      //bishop
        ' c. ',       //century
        ' C. ',       //county, counties
        ' cal. ',     //calendar
        ' Capt. ',    //captain
        ' Cert. ',    //certificate
        ' Col. ',     //Colonel
        ' Coll. ',    //college
        ' Collect. ', //collection
        ' Comp. ',    //company
        ' Conf. ',    //conference
        ' corresp. ', //corresponding to
        ' Dec. ',     //December
        ' Def. ',     //definition
        ' Dict. ',    //Dictionary
        ' Doc ',      //document(s)
        ' ed. ',      //edition
        ' Emb. ',     //embassy
        ' Engin. ',   //engineering
        ' Establ. ',  //establishment
        ' Eval. ',    //evaluation
        ' f. ',       //feminine
        ' Fam. ',     //family
        ' fam. ',     //family
        ' Feb. ',     //February
        ' fem. ',     //feminine
        ' gen. ',     //General
        ' Gov. ',     //government
        ' hist. ',    //historical
        ' Hosp. ',    //hospital
        ' i.e. ',     //for example
        ' ind. ',     //indicative
        ' Ind. ',     //industry
        ' Internat. ',//international
        ' Jan. ',     //January
        ' Jul. ',     //July
        ' Jun. ',     //June
        ' K. ',       //Kind
        ' Lab. ',     //laboratory
        ' m. ',       //masculine
        ' Mag. ',     //magazine
        ' Mar. ',     //March
        ' Math. ',    //mathematics
        ' Mr. ',      //mister
        ' Mrs. ',     //
        ' Ms. ',      //
        ' Mus. ',     //museum
        ' N. ',       //north
        ' Nat. Sci. ',//natural science
        ' No. ',      //number
        ' no. ',      //number
        ' Nov. ',     //November
        ' obj. ',     //object(s)
        ' Obj. ',     //object(s)
        ' Observ. ',  //observation(s)
        ' Oct. ',     //October
        ' O.E.D. ',   //Oxford English Dictionary
        ' Off. ',     //official, office
        ' Ord. ',     //order(s)
        ' ord. ',     //order(s)
        ' p. ',       //page
        ' Penins. ',  //peninsula
        ' Pharm. ',   //pharmacology
        ' prod. ',    //product(s)
        ' Prod. ',    //product(s)
        ' Psych. ',   //psychology
        ' quot. ',    //quotation
        ' rec. ',     //record(s)
        ' Rec. ',     //record(s)
        ' Reclam. ',  //reclamation
        ' Res. ',     //research
        ' s. ',       //south
        ' S. ',       //south, southern
        ' Sch. ',     //school
        ' Sci. ',     //science
        ' Sel. ',     //selected
        ' sel. ',     //selected
        ' Sept. ',    //September
        ' Soc. ',     //society
        ' St. ',      //street
        ' subj. ',    //subject
        ' Subscr. ',  //subscription
        ' Syst. ',    //system
        ' Tel. ',     //telegraph
        ' tr. ',      //translation
        ' transl. ',  //translation
        ' ult. ',     //ultimately
        ' Univ. ',    //university
        ' unkn. ',    //unknown
        ' Vac. ',     //vacation
        ' vol. ',     //volume
        ' Vol. ',     //volume
        ' w. ',       //west
        ' W. ',       //west, western
        ' wd. ',      //word
        ' Wkly. ',    //weekly
        ' wkly. ',    //weekly
        ' Yr. ',      //year
        ' yr. ',      //year
        ' Yrs. ',     //years
        ' yrs. ',     //years
    ];

    public const UNDOTTED = [
        ' absol ',
        ' Absol ',
        ' Abst ',
        ' abstr ',
        ' Acad ',
        ' acc ',
        ' Acc ',
        ' Accomm ',
        ' Accompl ',
        ' Accs ',
        ' Acct ',
        ' ad ',
        ' addr ',
        ' Afr ',
        ' Alph ',
        ' Ann ',
        ' Anniv ',
        ' Annot ',
        ' App ',
        ' Apr ',
        ' art ',
        ' Aug ',
        ' auth ',
        ' bef ',
        ' Biog ',
        ' Bp ',
        ' c ',
        ' C ',
        ' cal ',
        ' Capt ',
        ' Cert ',
        ' Col ',
        ' Coll ',
        ' Collect ',
        ' Comp ',
        ' Conf ',
        ' corresp ',
        ' Dec ',
        ' Def ',
        ' Dict ',
        ' Doc ',
        ' ed ',
        ' Emb ',
        ' Engin ',
        ' Establ ',
        ' Eval ',
        ' f ',
        ' Fam ',
        ' fam ',
        ' Feb ',
        ' fem ',
        ' gen ',
        ' Gov ',
        ' hist ',
        ' Hosp ',
        ' ie ',
        ' ind ',
        ' Ind ',
        ' Internat ',
        ' Jan ',
        ' Jul ',
        ' Jun ',
        ' K ',
        ' Lab ',
        ' m ',
        ' Mag ',
        ' Mar ',
        ' Math ',
        ' Mr ',
        ' Mrs ',
        ' Ms ',
        ' Mus ',
        ' N ',
        ' Nat Sci ',
        ' No ',
        ' no ',
        ' Nov ',
        ' obj ',
        ' Obj ',
        ' Observ ',
        ' Oct ',
        ' OED ',
        ' Off ',
        ' Ord ',
        ' ord ',
        ' p ',
        ' Penins ',
        ' Pharm ',
        ' prod ',
        ' Prod ',
        ' Psych ',
        ' quot ',
        ' rec ',
        ' Rec ',
        ' Reclam ',
        ' Res ',
        ' s ',
        ' S ',
        ' Sch ',
        ' Sci ',
        ' Sel ',
        ' sel ',
        ' Sept ',
        ' Soc ',
        ' St ',
        ' subj ',
        ' Subscr ',
        ' Syst ',
        ' Tel ',
        ' tr ',
        ' transl ',
        ' ult ',
        ' Univ ',
        ' unkn ',
        ' Vac ',
        ' vol ',
        ' Vol ',
        ' w ',
        ' W ',
        ' wd ',
        ' Wkly ',
        ' wkly ',
        ' Yr ',
        ' yr ',
        ' Yrs ',
        ' yrs ',
    ];
}
