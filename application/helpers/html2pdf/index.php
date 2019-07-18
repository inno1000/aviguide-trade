<?php

	ob_start();
?>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style>
		*{
			line-height: 4mm;
		}
	</style>
	<page backtop="10mm" backbottom="10mm" backleft="10mm" backright="10mm">
		<page_header>
			<div class="text-right">
				<strong class="text-info">Doing by Pocket</strong>
			</div>
		</page_header>
		<table class="table">
			<thead>
				<tr>
					<th class="col-pk-5 text-center">FILEUL</th>
					<th class="col-pk-5 text-center">PARRAINT</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="col-pk-5 text-letf">MATRICULE<br>NOM</td>
					<td class="col-pk-5 text-letf">MATRICULE<br>NOM</td>
				</tr>
			</tbody>
		</table>
		<page_footer>
			<div class="text-right">
				<strong class="text-info">Doing by Pocket</strong>
			</div>
		</page_footer>
		<script>
			document.write('temani');
		</script>
	</page>
<?php
	$content = ob_get_clean();

	//die($content);

	include_once "html2pdf.class.php";

	try{
		$pdf = new HTML2PDF('P', 'A4', 'fr');
		$pdf->pdf->SetDisplayMode('fullpage');
		$pdf->setDefaultFont('helvetica');
		$pdf->writeHTML(charMove($content, '<script', '</script>'));
		$pdf->Output('etat.pdf');
	}
	catch(HTML2PDF_exception $e)
	{
		die ($e);
	}

	function charMove($chaine, $ch1, $ch2)
	{
		$pos1 = strpos($chaine, $ch1);
		$pos2 = strpos($chaine, $ch2);

		if($pos1 != 0 && $pos2 > $pos1)
		{
			for($i=$pos1; $i<$pos2+strlen($ch2); $i++)
			{
				$chaine[$i]='';
			}
		}
		return $chaine;
	}
?>