<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Regimes proposes</title>
    <style>
        @page {
            margin: 18mm 14mm;
        }

        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 12px;
            color: #1f2937;
            line-height: 1.45;
        }

        .header {
            border-bottom: 2px solid #0f766e;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }

        .brand {
            font-size: 22px;
            font-weight: 700;
            color: #0f766e;
            margin: 0 0 4px;
        }

        .subtitle {
            color: #6b7280;
            margin: 0;
        }

        .meta {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
            font-size: 11px;
            color: #4b5563;
        }

        .grid {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        .grid td {
            vertical-align: top;
            width: 50%;
            padding-right: 10px;
        }

        .card {
            border: 1px solid #d1d5db;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 12px;
            page-break-inside: avoid;
        }

        .card-title {
            margin: 0 0 8px;
            font-size: 14px;
            color: #0f766e;
        }

        .info-list {
            width: 100%;
            border-collapse: collapse;
        }

        .info-list td {
            padding: 4px 0;
            border-bottom: 1px dotted #e5e7eb;
        }

        .label {
            color: #6b7280;
            width: 45%;
        }

        .value {
            text-align: right;
            font-weight: 600;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            margin: 18px 0 10px;
            color: #111827;
        }

        .regime {
            border: 1px solid #e5e7eb;
            border-left: 4px solid #0f766e;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 12px;
            page-break-inside: avoid;
        }

        .regime h3 {
            margin: 0 0 8px;
            font-size: 14px;
        }

        .regime-meta {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        .regime-meta td {
            padding: 3px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .muted {
            color: #6b7280;
        }

        ul {
            margin: 6px 0 0 18px;
            padding: 0;
        }

        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 10px;
            font-weight: 700;
            background: #ecfeff;
            color: #0f766e;
            margin-left: 8px;
        }

        .footer-note {
            margin-top: 20px;
            font-size: 10px;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 8px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="brand">Gestion d'alimentation</p>
        <p class="subtitle">Export PDF des regimes proposes et des informations de base du client</p>
    </div>

    <div class="meta">
        <div>
            <strong>Client :</strong> <?= esc($user['nom'] ?? 'N/A') ?><br>
            <strong>Email :</strong> <?= esc($user['email'] ?? 'N/A') ?><br>
            <strong>Genre :</strong> <?= esc($genreLabel ?? 'N/A') ?>
        </div>
        <div style="text-align: right;">
            <strong>Généré le :</strong> <?= esc($generatedAt ?? date('d/m/Y H:i')) ?><br>
            <strong>Objectif :</strong> <?= esc($objectif['libelle'] ?? 'N/A') ?><br>
            <strong>Maintenance :</strong> <?= esc(number_format((float) ($maintenance ?? 0), 0, ',', ' ')) ?> kcal/jour
        </div>
    </div>

    <table class="grid">
        <tr>
            <td>
                <div class="card">
                    <h2 class="card-title">Informations physiques</h2>
                    <table class="info-list">
                        <tr>
                            <td class="label">Poids actuel</td>
                            <td class="value"><?= esc(isset($profile['poids_actuel']) ? number_format((float) $profile['poids_actuel'], 1, ',', ' ') . ' kg' : 'N/A') ?></td>
                        </tr>
                        <tr>
                            <td class="label">Taille</td>
                            <td class="value"><?= esc(isset($profile['taille']) ? number_format((float) $profile['taille'], 0, ',', ' ') . ' cm' : 'N/A') ?></td>
                        </tr>
                        <tr>
                            <td class="label">IMC</td>
                            <td class="value"><?= esc($imc !== null ? number_format((float) $imc, 1, ',', ' ') : 'N/A') ?></td>
                        </tr>
                    </table>
                </div>
            </td>
            <td>
                <div class="card">
                    <h2 class="card-title">Objectif client</h2>
                    <table class="info-list">
                        <tr>
                            <td class="label">Poids cible</td>
                            <td class="value"><?= esc(isset($objectifData['poids_cible']) ? number_format((float) $objectifData['poids_cible'], 1, ',', ' ') . ' kg' : 'N/A') ?></td>
                        </tr>
                        <tr>
                            <td class="label">Régimes proposés</td>
                            <td class="value"><?= esc(count($regimes ?? [])) ?></td>
                        </tr>
                        <tr>
                            <td class="label">Statut</td>
                            <td class="value">Synthèse détaillée</td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>

    <div class="section-title">Détails des régimes proposés</div>

    <?php foreach (($regimes ?? []) as $regime): ?>
        <div class="regime">
            <h3>
                <?= esc($regime['nom']) ?>
                <?php if (!empty($regime['is_bought'])): ?>
                    <span class="badge">Déjà acheté</span>
                <?php endif; ?>
            </h3>

            <?php if (!empty($regime['description'])): ?>
                <div class="muted" style="margin-bottom: 8px;">
                    <?= esc($regime['description']) ?>
                </div>
            <?php endif; ?>

            <table class="regime-meta">
                <tr>
                    <td class="label">Impact minimal</td>
                    <td class="value"><?= esc(number_format((float) ($regime['poids_impact_semaine'] ?? 0), 1, ',', ' ')) ?> kg/semaine</td>
                </tr>
                <tr>
                    <td class="label">Durée estimée</td>
                    <td class="value"><?= esc((int) ($regime['duree_jours'] ?? 0)) ?> jours</td>
                </tr>
                <tr>
                    <td class="label">Prix journalier</td>
                    <td class="value"><?= esc(number_format((float) ($regime['prix_journalier'] ?? 0), 2, ',', ' ')) ?> €</td>
                </tr>
                <tr>
                    <td class="label">Prix total</td>
                    <td class="value"><?= esc(number_format((float) ($regime['prix_total'] ?? 0), 2, ',', ' ')) ?> €</td>
                </tr>
            </table>

            <?php if (!empty($regime['activites'])): ?>
                <div class="muted" style="font-weight: 700; margin-top: 8px;">Activités conseillées</div>
                <ul>
                    <?php foreach ($regime['activites'] as $activite): ?>
                        <li><?= esc($activite['name'] ?? '') ?> - <?= esc($activite['duree_minutes_jour'] ?? '') ?> min/jour</li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

    <div class="footer-note">
        Ce document reprend les informations disponibles dans l'application au moment de l'export.
    </div>
</body>
</html>
