<?php
$transferencias = [
	[
		'banco' => 'Banorte',
		'clabe' => '072 345 678 901 234 567',
		'beneficiario' => 'La Casa del Estudiante',
		'referencia' => 'PREVENTA-2024',
		'etiqueta' => 'Depósito / SPEI',
		'color' => '#b71c1c'
	],
	[
		'banco' => 'Spin by OXXO',
		'clabe' => '646 180 123 456 789 0',
		'beneficiario' => 'La Casa del Estudiante',
		'referencia' => 'SPIN-APORTE',
		'etiqueta' => 'Saldo Spin / OXXO',
		'color' => '#ff6f00'
	]
];

$tarjetas = [
	[
		'emisor' => 'Banorte Débito',
		'numero' => '5579 1000 0000 1234',
		'beneficiario' => 'La Casa del Estudiante',
		'referencia' => 'DEP-BANORTE',
		'etiqueta' => 'Depósito en ventanilla u OXXO',
		'color' => '#8e24aa'
	],
	[
		'emisor' => 'Spin by OXXO',
		'numero' => '4766 8400 1234 5678',
		'beneficiario' => 'La Casa del Estudiante',
		'referencia' => 'SPIN-TARJETA',
		'etiqueta' => 'Deposita en caja OXXO',
		'color' => '#ff6f00'
	]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aportar ahora - La Casa del Estudiante</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<style>
		:root {
			--blue-500: #1565C0;
			--blue-600: #0D47A1;
			--gray-100: #f5f7fb;
			--card: #ffffff;
			--shadow: 0 14px 32px rgba(0,0,0,0.08);
		}
		* { box-sizing: border-box; margin: 0; padding: 0; }
		body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(135deg, #f3f6ff 0%, #e7ebf5 50%, #f7f9ff 100%); color: #1f2a44; padding: 2rem; }
		header { max-width: 1000px; margin: 0 auto 1.5rem; display: flex; justify-content: space-between; align-items: center; gap: 12px; flex-wrap: wrap; }
		.logo { font-weight: 800; color: var(--blue-600); text-decoration: none; display: inline-flex; align-items: center; gap: 8px; }
		.logo i { color: var(--blue-500); }
		.actions { display: inline-flex; gap: 10px; align-items: center; flex-wrap: wrap; }
		.back-btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border-radius: 12px; background: #0e1b2d; color: #e8ecf2; font-weight: 800; text-decoration: none; box-shadow: 0 10px 24px rgba(0,0,0,0.12); border: 1px solid rgba(255,255,255,0.1); }
		.card { background: var(--card); border-radius: 16px; padding: 1.5rem; box-shadow: var(--shadow); border: 1px solid #e8ecf2; }
		.grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1rem; max-width: 1000px; margin: 0 auto; }
		h1 { font-size: 2rem; margin-bottom: 0.4rem; }
		h2 { font-size: 1.4rem; margin-bottom: 0.6rem; color: var(--blue-600); }
		p.lead { margin-bottom: 1rem; color: #42526b; }
		.badge { display: inline-flex; align-items: center; gap: 8px; padding: 6px 10px; border-radius: 10px; background: rgba(21,101,192,0.1); color: var(--blue-600); font-weight: 800; font-size: 0.9rem; }
		.muted { color: #607089; font-size: 0.95rem; }
		.pending { display: inline-flex; align-items: center; gap: 8px; padding: 10px 14px; border-radius: 12px; background: rgba(229,57,53,0.08); color: #c62828; font-weight: 800; border: 1px solid rgba(229,57,53,0.25); }
		.cta-disabled { display: inline-flex; align-items: center; gap: 8px; padding: 12px 16px; border-radius: 12px; background: #e0e7ff; color: #3949ab; font-weight: 800; border: 1px solid #c5cae9; text-decoration: none; cursor: not-allowed; opacity: 0.8; }
		.cta-transfer { display: inline-flex; align-items: center; gap: 8px; padding: 12px 16px; border-radius: 12px; background: #0d47a1; color: white; font-weight: 800; border: none; text-decoration: none; }
		.section { margin-bottom: 1.2rem; }
		ul { margin: 0.6rem 0 0 1rem; color: #42526b; }
		.banks-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 0.75rem; margin-top: 0.8rem; }
		.bank-card { position: relative; border-radius: 16px; padding: 1.1rem 1.2rem; background: linear-gradient(135deg, var(--card-color, #1565C0), #0f1c2d); box-shadow: 0 16px 32px rgba(0,0,0,0.14); display: grid; gap: 10px; color: #f7fbff; overflow: hidden; border: 1px solid rgba(255,255,255,0.08); }
		.bank-card::before { content: ""; position: absolute; inset: 0; background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.1), transparent 40%), radial-gradient(circle at 80% 0%, rgba(255,255,255,0.08), transparent 36%); opacity: 0.9; }
		.bank-card::after { content: ""; position: absolute; inset: 0; background: linear-gradient(120deg, rgba(255,255,255,0.06), transparent 40%); mix-blend-mode: screen; }
		.bank-card > * { position: relative; z-index: 1; }
		.bank-head { display: flex; align-items: center; justify-content: space-between; gap: 10px; }
		.bank-name { font-weight: 900; letter-spacing: 0.4px; font-size: 1.1rem; color: #fdfefe; }
		.bank-meta { display: inline-flex; align-items: center; gap: 8px; }
		.bank-chip { width: 34px; height: 26px; border-radius: 6px; background: rgba(255,255,255,0.22); display: grid; place-items: center; color: #0f1c2d; box-shadow: inset 0 1px 0 rgba(255,255,255,0.35); }
		.bank-tag { display: inline-flex; align-items: center; gap: 6px; padding: 6px 10px; border-radius: 12px; color: #fdfefe; font-weight: 800; font-size: 0.85rem; border: 1px solid rgba(255,255,255,0.25); background: rgba(0,0,0,0.18); }
		.bank-divider { height: 1px; background: rgba(255,255,255,0.18); margin: 4px 0; }
		.bank-field { font-weight: 700; color: #eaf2ff; display: grid; grid-template-columns: 100px 1fr; gap: 6px; font-size: 0.96rem; }
		.bank-label { color: rgba(255,255,255,0.7); font-weight: 700; }
		.card-field { font-weight: 700; color: #eaf2ff; display: grid; grid-template-columns: 110px 1fr; gap: 6px; font-size: 0.96rem; }
		.card-number { font-family: 'Courier New', Courier, monospace; letter-spacing: 1.5px; font-weight: 800; color: #fdfefe; }
		.bank-foot { display: flex; justify-content: space-between; align-items: center; gap: 10px; color: rgba(255,255,255,0.85); font-weight: 800; font-size: 0.92rem; }
		.bank-foot .ref { padding: 6px 10px; border-radius: 10px; background: rgba(255,255,255,0.16); border: 1px solid rgba(255,255,255,0.2); }
		.bank-foot .benef { color: rgba(255,255,255,0.8); }
		@media (max-width: 600px) { body { padding: 1rem; } }
	</style>
</head>
<body>
	<header>
		<a class="logo" href="../index.php"><i class="fas fa-home"></i> La Casa del Estudiante</a>
		<div class="actions">
			<a class="back-btn" href="../index.php"><i class="fas fa-arrow-left"></i> Volver al inicio</a>
			<span class="badge"><i class="fas fa-lock"></i> Paso seguro</span>
		</div>
	</header>

	<main class="grid">
		<section class="card">
			<h1>Aportar ahora</h1>
			<p class="lead">Elige transferencia para aportes inmediatos. El pago con tarjeta se habilitará pronto.</p>
			<div class="section">
				<h2><i class="fas fa-university"></i> Transferencias SPEI</h2>
				<p class="muted">Usa cualquiera de las cuentas; envía comprobante con la referencia indicada.</p>
				<div class="banks-grid">
					<?php foreach ($transferencias as $row): ?>
					<div class="bank-card" style="--card-color: <?php echo htmlspecialchars($row['color']); ?>;">
						<div class="bank-head">
							<div class="bank-name"><?php echo htmlspecialchars($row['banco']); ?></div>
							<div class="bank-meta">
								<span class="bank-chip"><i class="fas fa-wave-square"></i></span>
								<span class="bank-tag">
									<i class="fas fa-bolt"></i> <?php echo htmlspecialchars($row['etiqueta']); ?>
								</span>
							</div>
						</div>
						<div class="bank-divider"></div>
						<div class="bank-field"><span class="bank-label">CLABE</span><span><?php echo htmlspecialchars($row['clabe']); ?></span></div>
						<div class="bank-field"><span class="bank-label">Beneficiario</span><span><?php echo htmlspecialchars($row['beneficiario']); ?></span></div>
						<div class="bank-foot">
							<span class="benef">Ref: <?php echo htmlspecialchars($row['referencia']); ?></span>
							<span class="ref">SPEI</span>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<ul>
					<li>Envía el comprobante por WhatsApp al finalizar.</li>
					<li>Beneficios y créditos se activan al validar el pago.</li>
				</ul>
			</div>
			<div class="section">
				<h2><i class="fas fa-credit-card"></i> Depósito con tarjeta</h2>
				<p class="muted">Usa estos datos para depósito en ventanilla o caja OXXO (Spin).</p>
				<div class="banks-grid">
					<?php foreach ($tarjetas as $card): ?>
					<div class="bank-card" style="--card-color: <?php echo htmlspecialchars($card['color']); ?>;">
						<div class="bank-head">
							<div class="bank-name"><?php echo htmlspecialchars($card['emisor']); ?></div>
							<div class="bank-meta">
								<span class="bank-chip"><i class="fas fa-credit-card"></i></span>
								<span class="bank-tag">
									<i class="fas fa-store"></i> <?php echo htmlspecialchars($card['etiqueta']); ?>
								</span>
							</div>
						</div>
						<div class="bank-divider"></div>
						<div class="card-field"><span class="bank-label">Número</span><span class="card-number"><?php echo htmlspecialchars($card['numero']); ?></span></div>
						<div class="card-field"><span class="bank-label">Beneficiario</span><span><?php echo htmlspecialchars($card['beneficiario']); ?></span></div>
						<div class="bank-foot">
							<span class="benef">Ref: <?php echo htmlspecialchars($card['referencia']); ?></span>
							<span class="ref">Depósito</span>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<ul>
					<li>Presenta la tarjeta en OXXO o ventanilla para depósito.</li>
					<li>Envía tu comprobante por WhatsApp para activar beneficios.</li>
				</ul>
			</div>
			<a class="cta-transfer" href="https://wa.me/52" target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> Enviar comprobante</a>
		</section>
	</main>

	<section class="card" style="max-width: 1000px; margin: 1rem auto 0;">
		<h2><i class="fas fa-credit-card"></i> Pago con tarjeta</h2>
		<p class="muted">Estamos habilitando la pasarela. Podrás pagar con tarjeta de crédito/débito y Paypal</p>
		<div class="pending"><i class="fas fa-clock"></i> En proceso</div>
		<p style="margin-top:0.8rem;">Mientras tanto, usa transferencia SPEI para activar tus beneficios.</p>
		<a class="cta-disabled" aria-disabled="true"><i class="fas fa-ban"></i> Pago con tarjeta no disponible</a>
	</section>
</body>
</html>
