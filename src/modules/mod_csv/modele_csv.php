<?php

	require 'composer/vendor/autoload.php';
 
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Style\Alignment;
	use PhpOffice\PhpSpreadsheet\Style\Fill;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
	use PhpOffice\PhpSpreadsheet\Style\Color;
	use PhpOffice\PhpSpreadsheet\Style\Border;
	use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
	use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

	class ModeleCSV extends Connexion {
		
		public function __construct() {
			parent::__construct();
		}

		public function genererCSV() {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();

			$sheet = $this->enteteCSV($sheet);
			$data = $this->remplirCSV($sheet);
			$sheet = $data[0];
			$derniereLigne = $data[1];
			$sheet = $this->footerCSV($sheet, $derniereLigne);

			$writer = new Xlsx($spreadsheet);
			$writer->save('fichiers/csv_adherents/adherents.xlsx');
		}

		public function remplirCSV(Worksheet $sheet) {
			$requete = self::$bdd->prepare("SELECT * FROM adherent join ville on adherent.ID_ville = ville.ID_ville;");
			$requete->execute();
			$adherents = $requete->fetchAll();

			$sheet->getStyle('A11')->getBorders()->getBottom()->setBorderStyle(Border::BORDER_MEDIUM);

			$cellsStyleArray = [
				'font' => [
					'size' => 9,
				],
				'alignment' => [
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'vertical' => Alignment::VERTICAL_CENTER,
					'wrapText' => true,
				],
				'borders' => [
					'allBorders' => [
						'borderStyle' => Border::BORDER_THIN,
						'color' => ['argb' => '000000'],
					],
				],
			];

			foreach ($adherents as $key => $adherent) {

				foreach(range('A','X') as $columnID) {
					$sheet->getStyle($columnID.($key+12))->applyFromArray($cellsStyleArray);
				}

				foreach(range('I','S') as $columnID) {
					$sheet->getStyle($columnID.($key+12))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
				}

				$sheet->setCellValue('A'.($key+12), $key+1);

				$sheet->setCellValue('B'.($key+12), $adherent['nom']);
				$sheet->getStyle('B'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));

				$sheet->setCellValue('C'.($key+12), $adherent['prenom']);
				$sheet->getStyle('C'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));

				if ($adherent['code_postal'] != '93000') {
					$sheet->setCellValue('D'.($key+12), 0);
					$sheet->setCellValue('E'.($key+12), '=E11');
				} else {
					$sheet->setCellValue('D'.($key+12), '=D10');
					$sheet->setCellValue('E'.($key+12), 0);
				}
				$sheet->getStyle('D'.($key+12))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
				$sheet->getStyle('D'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('E'.($key+12))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
				$sheet->getStyle('E'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));

				if (substr($adherent['code_postal'], 0, 2) == '93') {
					$sheet->setCellValue('F'.($key+12), 1);
				} else {
					$sheet->setCellValue('G'.($key+12), substr($adherent['code_postal'], 0, 2));
					$sheet->setCellValue('H'.($key+12), 1);
				}
				$sheet->getStyle('F'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('H'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));

				$sheet->getStyle('I'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('K'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('K'.($key+12))->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);

				$sheet->getStyle('L'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('P'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));

				$sheet->getStyle('Q'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('Q'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('Q'.($key+12))->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);

				$sheet->getStyle('R'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('S'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				

				$date = new DateTime($adherent['date_de_naissance']);
				$now = new DateTime();
				$age = $now->diff($date)->y;
				if($age < 18) {
					if ($adherent['sexe'] == 'F') {
						$sheet->setCellValue('U'.($key+12), 1);
					} else {
						$sheet->setCellValue('T'.($key+12), 1);
					}
				} else {
					if ($adherent['sexe'] == 'F') {
						$sheet->setCellValue('W'.($key+12), 1);
					} else {
						$sheet->setCellValue('V'.($key+12), 1);
					}
				}
				$sheet->getStyle('T'.($key+12))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('T'.($key+12))->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('8db3e2');
				$sheet->getStyle('U'.($key+12))->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('e5b8b7');
				$sheet->getStyle('V'.($key+12))->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('8db3e2');
				$sheet->getStyle('W'.($key+12))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM)->setColor(new Color('000000'));
				$sheet->getStyle('W'.($key+12))->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('e5b8b7');
			}

			$derniereLigne = count($adherents)+11;
			return [$sheet, $derniereLigne];

		}

		public function enteteCSV(Worksheet $sheet) {

			$sheet->getColumnDimension('A')->setWidth(30,'px');
			$sheet->getColumnDimension('B')->setWidth(150,'px');
			$sheet->getColumnDimension('C')->setWidth(120,'px');
			$sheet->getColumnDimension('D')->setWidth(85,'px');
			$sheet->getColumnDimension('E')->setWidth(75,'px');
			$sheet->getColumnDimension('F')->setWidth(45,'px');
			$sheet->getColumnDimension('G')->setWidth(33,'px');
			$sheet->getColumnDimension('H')->setWidth(45,'px');
			$sheet->getColumnDimension('I')->setWidth(45,'px');
			$sheet->getColumnDimension('J')->setWidth(80,'px');
			$sheet->getColumnDimension('K')->setWidth(75,'px');
			$sheet->getColumnDimension('L')->setWidth(70,'px');
			$sheet->getColumnDimension('M')->setWidth(60,'px');
			$sheet->getColumnDimension('N')->setWidth(60,'px');
			$sheet->getColumnDimension('O')->setWidth(60,'px');
			$sheet->getColumnDimension('P')->setWidth(60,'px');
			$sheet->getColumnDimension('Q')->setWidth(80,'px');
			$sheet->getColumnDimension('R')->setWidth(50,'px');
			$sheet->getColumnDimension('S')->setWidth(50,'px');
			$sheet->getColumnDimension('T')->setWidth(45,'px');
			$sheet->getColumnDimension('U')->setWidth(45,'px');
			$sheet->getColumnDimension('V')->setWidth(45,'px');
			$sheet->getColumnDimension('W')->setWidth(45,'px');
			$sheet->getColumnDimension('X')->setWidth(133,'px');

			$sheet->getDefaultRowDimension()->setRowHeight(30,'px');
			$sheet->getRowDimension('7')->setRowHeight(45,'px');
			$sheet->getRowDimension('9')->setRowHeight(30,'px');
			$sheet->getRowDimension('10')->setRowHeight(33,'px');
			$sheet->getRowDimension('11')->setRowHeight(33,'px');
			
			$infosStyleArray = [
				'font' => [
					'bold' => true,
					'size' => 14,
				],
				'alignment' => [
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'vertical' => Alignment::VERTICAL_CENTER,
				],
			];

			$titlesStyleArray = [
				'font' => [
					'bold' => true,
					'size' => 9,
				],
				'alignment' => [
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'vertical' => Alignment::VERTICAL_CENTER,
					'wrapText' => true,
				],
				'borders' => [
					'allBorders' => [
						'borderStyle' => Border::BORDER_MEDIUM,
						'color' => ['argb' => '000000'],
					],
				],
			];

			$cellsStyleArray = [
				'font' => [
					'size' => 9,
				],
				'alignment' => [
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'vertical' => Alignment::VERTICAL_CENTER,
					'wrapText' => true,
				],
				'borders' => [
					'allBorders' => [
						'borderStyle' => Border::BORDER_THIN,
						'color' => ['argb' => '000000'],
					],
				],
			];

			$drawing = new Drawing();
			$drawing->setName('logo');
			$drawing->setDescription('logo');
			$drawing->setPath('fichiers/logo_acb.png');
			$drawing->setCoordinates('A1');
			$drawing->setHeight(60);
			$drawing->setWorksheet($sheet);

			$sheet->mergeCells('A1:X2');
			$saison = date("M") >= 9 ? date("Y") . "-" . (date("Y") + 1) : (date("Y") - 1) . "-" . date("Y");
			$sheet->setCellValue('A1', 'ADHERENTS SAISON SPORTIVE ' . $saison);

			$sheet->mergeCells('A3:X3');
			$sheet->setCellValue('A3', 'NE RIEN INSCRIRE DANS LES COLONNES JAUNES LE CALCUL SE FAIT AUTOMATIQUEMENT, ET NE PAS TOUCHER AUX FORMULES.');
			$sheet->getStyle('A3')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('A3')->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);

			$sheet->mergeCells('C4:C5');
			$sheet->setCellValue('C4', 'SECTION :');
			$sheet->getStyle('C4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

			$sheet->mergeCells('D4:E5');
			$sheet->setCellValue('D4', 'AIKIDO');
			$sheet->getStyle('D4')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

			$sheet->mergeCells('F4:X4');
			$sheet->setCellValue('F4', 'Dans les colonnes départements mettre le numéro si pas 93 et dans les autres et dans celles des âges mettre des 1.');
			$sheet->getStyle('F4')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('F4')->getFill()->getStartColor()->setARGB('ccffff');

			$sheet->mergeCells('F5:X5');
			$sheet->setCellValue('F5','Ne pas supprimer de lignes, si plus de 250 adhérents demander au siège un tableau avec le nombre nécessaire.');
			$sheet->getStyle('F5')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('F5')->getFill()->getStartColor()->setARGB('ccffff');

			$sheet->mergeCells('F6:X6');
			$sheet->setCellValue('F6','RAPPEL : PAS DE REDUCTION CLUB DE 15€ SI BONS CAF OU ANCV OU AUTRES REDUCTIONS.');
			$sheet->getStyle('F6')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('F6')->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);

			$sheet->getStyle('A1:X3')->applyFromArray($infosStyleArray);
			$sheet->getStyle('C4:X5')->applyFromArray($infosStyleArray);
			$sheet->getStyle('F6:X6')->applyFromArray($infosStyleArray);

			$sheet->mergeCells('B7:B9');
			$sheet->setCellValue('B7', 'Nom');

			$sheet->mergeCells('C7:C9');
			$sheet->setCellValue('C7', 'Prénom');

			$sheet->mergeCells('D7:E7');
			$sheet->setCellValue('D7', 'Montant des cotisations');

			$sheet->mergeCells('D8:D9');
			$sheet->setCellValue('D8', 'Bobigny');

			$sheet->mergeCells('E8:E9');
			$sheet->setCellValue('E8', 'Exterieur');

			$sheet->mergeCells('F7:H7');
			$sheet->setCellValue('F7', 'Départements');

			$sheet->setCellValue('F8', '93');

			$sheet->mergeCells('G8:H8');
			$sheet->setCellValue('G8', 'Autres');

			$sheet->setCellValue('F9', '(1)');

			$sheet->setCellValue('G9', 'N°');

			$sheet->setCellValue('H9', '(1)');

			$sheet->mergeCells('I7:K7');
			$sheet->setCellValue('I7', 'Réductions');

			$sheet->mergeCells('I8:I9');
			$sheet->setCellValue('I8', 'Club -15€');

			$sheet->mergeCells('J8:J9');
			$sheet->setCellValue('J8', 'Autre');

			$sheet->mergeCells('K8:K9');
			$sheet->setCellValue('K8', 'Total réduction');
			$sheet->getStyle('K8')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('K8')->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);

			$sheet->mergeCells('L7:P7');
			$sheet->setCellValue('L7', 'Reglement');

			$sheet->mergeCells('L8:L9');
			$sheet->setCellValue('L8', 'Chèque');

			$sheet->mergeCells('M8:M9');
			$sheet->setCellValue('M8', 'C.B.');

			$sheet->mergeCells('N8:N9');
			$sheet->setCellValue('N8', 'Espèce');

			$sheet->mergeCells('O8:O9');
			$sheet->setCellValue('O8', 'ANCV');

			$sheet->mergeCells('P8:P9');
			$sheet->setCellValue('P8', 'CAF');

			$sheet->mergeCells('Q7:Q9');
			$sheet->setCellValue('Q7', 'Montant cotisation Payé');
			$sheet->getStyle('Q7')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('Q7')->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);

			$sheet->mergeCells('R7:S7');
			$sheet->setCellValue('R7', 'MMA');

			$sheet->setCellValue('R8', 'Espèce');

			$sheet->setCellValue('S8', 'Chèque');

			$sheet->mergeCells('T7:W7');
			$sheet->setCellValue('T7', 'Catégories  d\'âges et sexes');

			$sheet->mergeCells('T8:U8');
			$sheet->setCellValue('T8', '-18 ANS');

			$sheet->mergeCells('V8:W8');
			$sheet->setCellValue('V8', '+18 ANS');

			$sheet->setCellValue('T9', 'M');
			$sheet->getStyle('T9')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('T9')->getFill()->getStartColor()->setARGB('8db3e2');

			$sheet->setCellValue('U9', 'F');
			$sheet->getStyle('U9')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('U9')->getFill()->getStartColor()->setARGB('e5b8b7');

			$sheet->setCellValue('V9', 'M');
			$sheet->getStyle('V9')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('V9')->getFill()->getStartColor()->setARGB('8db3e2');

			$sheet->setCellValue('W9', 'F');
			$sheet->getStyle('W9')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('W9')->getFill()->getStartColor()->setARGB('e5b8b7');

			$sheet->mergeCells('X7:X9');
			$sheet->setCellValue('X7', 'N° de licence');

			$sheet->getStyle('B7:X9')->applyFromArray($titlesStyleArray);

			$sheet->mergeCells('B10:C11');
			$sheet->setCellValue('B10', 'Exemple, ne rien écrire dans ces 2 lignes et ne pas les supprimer');
			$sheet->getStyle('B10:C11')->applyFromArray($cellsStyleArray);
			$sheet->getStyle('B10')->getFont()->setBold(true);
			$sheet->getStyle('B10')->getFont()->setSize(13);
			$sheet->getStyle('B10')->getAlignment()->setWrapText(true);

			$sheet->setCellValue('D10', 150);
			$sheet->getStyle('D10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('E11', 150);
			$sheet->getStyle('E11')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('F10', 1);

			$sheet->setCellValue('G11', 75);

			$sheet->setCellValue('H11', 1);

			$sheet->setCellValue('J11', 5);
			$sheet->getStyle('J11')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('K11', '=SUM(I11:J11)');
			$sheet->getStyle('K11')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('L11', 145);
			$sheet->getStyle('L11')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('N10', 40);
			$sheet->getStyle('N10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('P10', 110);
			$sheet->getStyle('P10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('Q10', '=SUM(L10:P10)');
			$sheet->getStyle('Q10')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('Q11', '=SUM(L11:P11)');
			$sheet->getStyle('Q11')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('T10', 1);

			$sheet->setCellValue('U11', 1);

			$sheet->setCellValue('V10', 1);
			
			$sheet->setCellValue('W11', 1);

			$sheet->getStyle('B10:X11')->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('B10:X11')->getFill()->getStartColor()->setARGB('ccffff');

			$sheet->getStyle('D10:X11')->applyFromArray($cellsStyleArray);

			$sheet->getStyle('B10')->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('C10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('E10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('E11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('H10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('H11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('K10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('K11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('P10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('P11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('Q10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('Q11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('S10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('S11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('W10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('W11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('X10')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('X11')->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('Q11')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);
			$sheet->getStyle('Q10')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);
			$sheet->getStyle('K10:K11')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB(Color::COLOR_YELLOW);

			return $sheet;
		}

		public function footerCSV(Worksheet $sheet, int $derniereLigne) {
			$debutFooter = $derniereLigne + 1;

			$sheet->getStyle('A'.($derniereLigne))->getBorders()->getBottom()->setBorderStyle(Border::BORDER_MEDIUM);

			$footerStyleArray = [
				'font' => [
					'bold' => true,
					'size' => 10,
				],
				'alignment' => [
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'vertical' => Alignment::VERTICAL_CENTER,
				],
				'borders' => [
					'bottom' => [
						'borderStyle' => Border::BORDER_MEDIUM,
						'color' => ['argb' => '000000'],
					],
					'top' => [
						'borderStyle' => Border::BORDER_MEDIUM,
						'color' => ['argb' => '000000'],
					],
					'left' => [
						'borderStyle' => Border::BORDER_THIN,
						'color' => ['argb' => '000000'],
					],
					'right' => [
						'borderStyle' => Border::BORDER_THIN,
						'color' => ['argb' => '000000'],
					],
				],
			];

			$footer2StyleArray = [
				'font' => [
					'bold' => true,
					'size' => 10,
				],
				'alignment' => [
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'vertical' => Alignment::VERTICAL_CENTER,
				],
				'borders' => [
					'allBorders' => [
						'borderStyle' => Border::BORDER_THIN,
						'color' => ['argb' => '000000'],
					],
				],
			];

			$sheet->getRowDimension($debutFooter)->setRowHeight(40,'px');
			$sheet->getRowDimension($debutFooter+1)->setRowHeight(40,'px');
			for ($i=2; $i <= 6; $i++) { 
				$sheet->getRowDimension($debutFooter+$i)->setRowHeight(26,'px');
			}

			$sheet->setCellValue('C'.$debutFooter, 'Total');

			$sheet->setCellValue('D'.$debutFooter, '=SUM(D12:D'.$derniereLigne.')');
			$sheet->getStyle('D'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('E'.$debutFooter, '=SUM(E12:E'.$derniereLigne.')');
			$sheet->getStyle('E'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('F'.$debutFooter, '=SUM(F12:F'.$derniereLigne.')');

			$sheet->setCellValue('H'.$debutFooter, '=SUM(H12:H'.$derniereLigne.')');

			$sheet->setCellValue('I'.$debutFooter, '=SUM(I12:I'.$derniereLigne.')');
			$sheet->getStyle('I'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('J'.$debutFooter, '=SUM(J12:J'.$derniereLigne.')');
			$sheet->getStyle('J'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('K'.$debutFooter, '=SUM(K12:K'.$derniereLigne.')');
			$sheet->getStyle('K'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('L'.$debutFooter, '=SUM(L12:L'.$derniereLigne.')');
			$sheet->getStyle('L'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('M'.$debutFooter, '=SUM(M12:M'.$derniereLigne.')');
			$sheet->getStyle('M'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('N'.$debutFooter, '=SUM(N12:N'.$derniereLigne.')');
			$sheet->getStyle('N'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('O'.$debutFooter, '=SUM(O12:O'.$derniereLigne.')');
			$sheet->getStyle('O'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('P'.$debutFooter, '=SUM(P12:P'.$derniereLigne.')');
			$sheet->getStyle('P'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('Q'.$debutFooter, '=SUM(Q12:Q'.$derniereLigne.')');
			$sheet->getStyle('Q'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('R'.$debutFooter, '=SUM(R12:R'.$derniereLigne.')');
			$sheet->getStyle('R'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('S'.$debutFooter, '=SUM(S12:S'.$derniereLigne.')');
			$sheet->getStyle('S'.$debutFooter)->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->setCellValue('T'.$debutFooter, '=SUM(T12:T'.$derniereLigne.')');

			$sheet->setCellValue('U'.$debutFooter, '=SUM(U12:U'.$derniereLigne.')');

			$sheet->setCellValue('V'.$debutFooter, '=SUM(V12:V'.$derniereLigne.')');

			$sheet->setCellValue('W'.$debutFooter, '=SUM(W12:W'.$derniereLigne.')');

			foreach(range('B','W') as $columnID) {
				$sheet->getStyle($columnID.$debutFooter)->applyFromArray($footerStyleArray);
			}

			$sheet->getStyle('D'.$debutFooter.':E'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('D'.$debutFooter.':E'.$debutFooter)->getFill()->getStartColor()->setARGB('fabf8f');
			$sheet->getStyle('G'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('G'.$debutFooter)->getFill()->getStartColor()->setARGB('000000');
			$sheet->getStyle('I'.$debutFooter.':J'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('I'.$debutFooter.':J'.$debutFooter)->getFill()->getStartColor()->setARGB('fabf8f');
			$sheet->getStyle('K'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('K'.$debutFooter)->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);
			$sheet->getStyle('L'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('L'.$debutFooter)->getFill()->getStartColor()->setARGB('fabf8f');
			$sheet->getStyle('Q'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('Q'.$debutFooter)->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);
			$sheet->getStyle('R'.$debutFooter.':S'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('R'.$debutFooter.':S'.$debutFooter)->getFill()->getStartColor()->setARGB(COLOR::COLOR_MAGENTA);
			$sheet->getStyle('T'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('T'.$debutFooter)->getFill()->getStartColor()->setARGB('8db3e2');
			$sheet->getStyle('V'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('V'.$debutFooter)->getFill()->getStartColor()->setARGB('8db3e2');
			$sheet->getStyle('U'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('U'.$debutFooter)->getFill()->getStartColor()->setARGB('e5b8b7');
			$sheet->getStyle('W'.$debutFooter)->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('W'.$debutFooter)->getFill()->getStartColor()->setARGB('e5b8b7');

			$sheet->mergeCells('D'.($debutFooter+1).':E'.($debutFooter+1));
			$sheet->setCellValue('D'.($debutFooter+1), '=SUM(D'.$debutFooter.':E'.$debutFooter.')');
			$sheet->getStyle('D'.($debutFooter+1))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
			$sheet->getStyle('D'.($debutFooter+1))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('D'.($debutFooter+1))->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);
			$sheet->getStyle('D'.($debutFooter+1).':E'.($debutFooter+1))->applyFromArray($footer2StyleArray);

			$sheet->mergeCells('O'.($debutFooter+1).':P'.($debutFooter+1));
			$sheet->setCellValue('O'.($debutFooter+1), '=SUM(O'.$debutFooter.':P'.$debutFooter.')');
			$sheet->getStyle('O'.($debutFooter+1))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
			$sheet->getStyle('O'.($debutFooter+1))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('O'.($debutFooter+1))->getFill()->getStartColor()->setARGB('00ccff');
			$sheet->getStyle('O'.($debutFooter+1).':P'.($debutFooter+1))->applyFromArray($footer2StyleArray);

			$sheet->mergeCells('B'.($debutFooter+2).':C'.($debutFooter+2));
			$sheet->setCellValue('B'.($debutFooter+2), 'Total cotisations avant réductions');
			$sheet->getStyle('B'.($debutFooter+2).':C'.($debutFooter+2))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('B'.($debutFooter+2))->getFont()->setBold(false);
			$sheet->getStyle('B'.($debutFooter+2))->getFont()->setSize(12);

			$sheet->mergeCells('B'.($debutFooter+3).':C'.($debutFooter+3));
			$sheet->setCellValue('B'.($debutFooter+3), 'Total des réductions');
			$sheet->getStyle('B'.($debutFooter+3).':C'.($debutFooter+3))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('B'.($debutFooter+3))->getFont()->setBold(false);
			$sheet->getStyle('B'.($debutFooter+3))->getFont()->setSize(12);

			$sheet->mergeCells('B'.($debutFooter+4).':C'.($debutFooter+4));
			$sheet->setCellValue('B'.($debutFooter+4), 'Cotisations réellement perçues');
			$sheet->getStyle('B'.($debutFooter+4).':C'.($debutFooter+4))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('B'.($debutFooter+4))->getFont()->setBold(false);
			$sheet->getStyle('B'.($debutFooter+4))->getFont()->setSize(12);

			$sheet->getStyle('B'.($debutFooter+2).':E'.($debutFooter+4))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('B'.($debutFooter+2).':E'.($debutFooter+4))->getFill()->getStartColor()->setARGB('fabf8f');

			$sheet->mergeCells('D'.($debutFooter+2).':E'.($debutFooter+2));
			$sheet->setCellValue('D'.($debutFooter+2), '=D'.($debutFooter+1));
			$sheet->getStyle('D'.($debutFooter+2))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->mergeCells('D'.($debutFooter+3).':E'.($debutFooter+3));
			$sheet->setCellValue('D'.($debutFooter+3), '=K'.($debutFooter));
			$sheet->getStyle('D'.($debutFooter+3))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->mergeCells('D'.($debutFooter+4).':E'.($debutFooter+4));
			$sheet->setCellValue('D'.($debutFooter+4), '=D'.($debutFooter+2).'-D'.($debutFooter+3));
			$sheet->getStyle('D'.($debutFooter+4))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->getStyle('D'.($debutFooter+2).':E'.($debutFooter+4))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('D'.($debutFooter+2).':E'.($debutFooter+4))->getFont()->setColor(new Color(Color::COLOR_RED));
			$sheet->getStyle('D'.($debutFooter+2).':E'.($debutFooter+4))->getFont()->setSize(9);

			$sheet->mergeCells('J'.($debutFooter+2).':K'.($debutFooter+3));
			$sheet->setCellValue('J'.($debutFooter+2), 'contrôles');
			$sheet->getStyle('J'.($debutFooter+2).':K'.($debutFooter+3))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('J'.($debutFooter+2).':K'.($debutFooter+3))->getFont()->setSize(12);

			$sheet->mergeCells('L'.($debutFooter+2).':P'.($debutFooter+3));
			$sheet->setCellValue('L'.($debutFooter+2), '=SUM(L'.$debutFooter.':P'.$debutFooter.')');
			$sheet->getStyle('L'.($debutFooter+2).':P'.($debutFooter+3))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('L'.($debutFooter+2).':P'.($debutFooter+3))->getFont()->setSize(9);
			$sheet->getStyle('L'.($debutFooter+2))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

			$sheet->getStyle('J'.($debutFooter+2).':P'.($debutFooter+3))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('J'.($debutFooter+2).':P'.($debutFooter+3))->getFill()->getStartColor()->setARGB('99cc00');

			$sheet->mergeCells('R'.($debutFooter+2).':S'.($debutFooter+3));
			$sheet->setCellValue('R'.($debutFooter+2), '=SUM(R'.$debutFooter.':S'.$debutFooter.')');
			$sheet->getStyle('R'.($debutFooter+2).':S'.($debutFooter+3))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('R'.($debutFooter+2).':S'.($debutFooter+3))->getFont()->setSize(9);
			$sheet->getStyle('R'.($debutFooter+2).':S'.($debutFooter+3))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('R'.($debutFooter+2).':S'.($debutFooter+3))->getFill()->getStartColor()->setARGB(Color::COLOR_MAGENTA);

			$sheet->mergeCells('T'.($debutFooter+2).':U'.($debutFooter+3));
			$sheet->setCellValue('T'.($debutFooter+2), '=SUM(T'.$debutFooter.'+V'.$debutFooter.')');
			$sheet->getStyle('T'.($debutFooter+2).':U'.($debutFooter+3))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('T'.($debutFooter+2).':U'.($debutFooter+3))->getFont()->setSize(12);
			$sheet->getStyle('T'.($debutFooter+2).':U'.($debutFooter+3))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('T'.($debutFooter+2).':U'.($debutFooter+3))->getFill()->getStartColor()->setARGB('8db3e2');

			$sheet->mergeCells('V'.($debutFooter+2).':W'.($debutFooter+3));
			$sheet->setCellValue('V'.($debutFooter+2), '=SUM(U'.$debutFooter.'+W'.$debutFooter.')');
			$sheet->getStyle('V'.($debutFooter+2).':W'.($debutFooter+3))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('V'.($debutFooter+2).':W'.($debutFooter+3))->getFont()->setSize(12);
			$sheet->getStyle('V'.($debutFooter+2).':W'.($debutFooter+3))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('V'.($debutFooter+2).':W'.($debutFooter+3))->getFill()->getStartColor()->setARGB('e5b8b7');

			$sheet->mergeCells('T'.($debutFooter+4).':W'.($debutFooter+5));
			$sheet->setCellValue('T'.($debutFooter+4), '=SUM(T'.($debutFooter+2).':W'.($debutFooter+3).')');
			$sheet->getStyle('T'.($debutFooter+4).':W'.($debutFooter+5))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('T'.($debutFooter+4).':W'.($debutFooter+5))->getFont()->setSize(12);

			$sheet->mergeCells('N'.($debutFooter+5).':O'.($debutFooter+6));
			$sheet->setCellValue('N'.($debutFooter+5), '=SUM(Q'.$debutFooter.'+K'.$debutFooter.')');
			$sheet->getStyle('N'.($debutFooter+5).':O'.($debutFooter+6))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('N'.($debutFooter+5).':O'.($debutFooter+6))->getFont()->setSize(9);
			$sheet->getStyle('N'.($debutFooter+5))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
			$sheet->getStyle('N'.($debutFooter+5).':O'.($debutFooter+6))->getFill()->setFillType(Fill::FILL_SOLID);
			$sheet->getStyle('N'.($debutFooter+5).':O'.($debutFooter+6))->getFill()->getStartColor()->setARGB(Color::COLOR_YELLOW);

			$sheet->setCellValue('I'.($debutFooter+6), 'Ecart');
			$sheet->getStyle('I'.($debutFooter+6))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('I'.($debutFooter+6))->getFont()->setSize(9);
			$sheet->getStyle('I'.($debutFooter+6))->getFont()->setBold(false);
			
			$sheet->setCellValue('J'.($debutFooter+6), '=SUM(D'.($debutFooter+1).'-N'.($debutFooter+5).')');
			$sheet->getStyle('J'.($debutFooter+6))->applyFromArray($footer2StyleArray);
			$sheet->getStyle('J'.($debutFooter+6))->getFont()->setSize(9);
			$sheet->getStyle('J'.($debutFooter+6))->getFont()->setBold(false);
			$sheet->getStyle('J'.($debutFooter+6))->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);


			$sheet->getStyle('B'.($derniereLigne + 1))->getBorders()->getLeft()->setBorderStyle(Border::BORDER_MEDIUM);
			$sheet->getStyle('W'.($derniereLigne + 1))->getBorders()->getRight()->setBorderStyle(Border::BORDER_MEDIUM);

			return $sheet;
		}
	}

?>