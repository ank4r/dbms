<?php
include('helper_modules.php');

 $cid1 = populate_course("Linear Algebra","Mathematics",1,"2008-11-11","Linear algebra is the branch of mathematics concerning vector spaces and linear mappings between such spaces. It includes the study of lines, planes, and subspaces, but is also concerned with properties common to all vector spaces.");

	 	$tid1 = populate_topics($cid1, "Linear Equations");
				$stid1_1 = populate_subtopics($tid1, "System of linear Equations");
				$stid1_2 = populate_subtopics($tid1, "Determinants");
				$stid1_3 = populate_subtopics($tid1, "Cramer\'s Rule");
				$stid1_4 = populate_subtopics($tid1, "Gaussian Elimination");
				$stid1_5 = populate_subtopics($tid1, "Gauss-Jordan Elimination");
				$stid1_6 = populate_subtopics($tid1, "Strassen Algorithm");
		$tid2 = populate_topics($cid1, "Matrices");
				$stid2_1 = populate_subtopics($tid2, "2x2 Real Matrices");
				$stid2_2 = populate_subtopics($tid2, "Matrix theory");
				$stid2_3 = populate_subtopics($tid2, "Matrix Addition");
				$stid2_4 = populate_subtopics($tid2, "Matrix Multiplication");
				$stid2_5 = populate_subtopics($tid2, "Basis Transformation Matrix");
				$stid2_6 = populate_subtopics($tid2, "Characteristic Polynomial");
				$stid2_7 = populate_subtopics($tid2, "Trace");
				$stid2_8 = populate_subtopics($tid2, "Eigenvalue, Eigenvector, Eigenspace");
				$stid2_9 = populate_subtopics($tid2, "Rank");
				$stid2_10 = populate_subtopics($tid2, "Matrix Inversion & Invertible Matrices");
				$stid2_11 = populate_subtopics($tid2, "Adjugate");
				$stid2_12 = populate_subtopics($tid2, "Transpose");
				$stid2_13 = populate_subtopics($tid2, "Positive definite, positive semi-definite matrices");
				$stid2_14 = populate_subtopics($tid2, "Plaffian");
				$stid2_15 = populate_subtopics($tid2, "Projection");
				$stid2_16 = populate_subtopics($tid2, "Spectral Theorem");
				$stid2_17 = populate_subtopics($tid2, "Perron Frobenius Theorem");
				$stid2_18 = populate_subtopics($tid2, "List of Matrices");
		$tid3 = populate_topics($cid1, "Matrix Decompositions");
				$stid3_1 = populate_subtopics($tid3, "Cholesky Decomposition");
				$stid3_2 = populate_subtopics($tid3, "LU Decomposition");
				$stid3_3 = populate_subtopics($tid3, "QR Decomposition");
				$stid3_4 = populate_subtopics($tid3, "Polar Decomposition");
				$stid3_5 = populate_subtopics($tid3, "Spectral Theorem");
				$stid3_6 = populate_subtopics($tid3, "Singular Value Decomposition");
				$stid3_7 = populate_subtopics($tid3, "Schur Decomposition");
		$tid4 = populate_topics($cid1, "Relations");
				$stid4_1 = populate_subtopics($tid4, "Matrix Equivalence");
				$stid4_2 = populate_subtopics($tid4, "Matrix Congruence");
				$stid4_3 = populate_subtopics($tid4, "Matrix Similarity");
				$stid4_4 = populate_subtopics($tid4, "Matrix Cosimilarity");
				$stid4_5 = populate_subtopics($tid4, "Row Equivalence");
		$tid5 = populate_topics($cid1, "Computations");
		$tid6 = populate_topics($cid1, "Vector Spaces");
		$tid7 = populate_topics($cid1, "Structures");
		$tid8 = populate_topics($cid1, "Multilinear Algebra");
		$tid9 = populate_topics($cid1, "Affine Space & related topics");
		$tid10 = populate_topics($cid1, "Projective Space");

 $cid2 = populate_course("Trigonometry","Mathematics",1,"2014-09-03","Trigonometry (from Greek trigōnon, \"triangle\" and metron, \"measure\") is a branch of mathematics that studies relationships involving lengths and angles of triangles. The field emerged in the Hellenistic world during the 3rd century BC from applications of geometry to astronomical studies.");

 $cid3 = populate_course("Algorithms",("Computer Science,Mathematics"),1,"2004-03-04","In mathematics and computer science, an algorithm ( i/ˈælɡərɪðəm/ AL-gə-ri-dhəm) is a self-contained step-by-step set of operations to be performed. Algorithms exist that perform calculation, data processing, and automated reasoning.");

 $cid4 = populate_course("Proteins & Biomolecules",("Biology,Chemistry"),1,"2010-01-06","A biomolecule or biological molecule is any molecule that is present in living organisms, including large macromolecules such as proteins, carbohydrates, lipids, and nucleic acids, as well as small molecules such as primary metabolites, secondary metabolites, and natural products. A more general name for this class of material is biological materials. Biomolecules are usually endogenous but may also be exogenous. For example, pharmaceutical drugs may be natural products or semisynthetic (biopharmaceuticals) or they may be totally synthetic.");

	enroll_students(get_stud_id(1) , $cid1);
	enroll_students(get_stud_id(1) , $cid3);
	enroll_students(get_stud_id(1) , $cid4);

	exit();
?>
