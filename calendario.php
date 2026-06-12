<?php
// =============================================
// Dados da Agenda — Dr. Guilherme Arantes
// =============================================

$medico = [
    'nome'        => 'Dr. Guilherme Arantes',
    'especialidade' => 'Cardiologia',
    'clinica'     => 'Clínica Médica Integrada',
];

// Status: 'confirmado', 'pendente', 'retorno', 'exame', 'eletro'
$consultas = [
    'segunda' => [
        'data'  => '15/06',
        'slots' => [
            ['hora' => '08:00', 'paciente' => 'Carlos Eduardo', 'tipo' => 'retorno',    'status' => 'confirmado'],
            ['hora' => '09:00', 'paciente' => 'Amélia Souza',   'tipo' => 'eletro',     'status' => 'pendente'],
            ['hora' => '10:00', 'paciente' => null,             'tipo' => 'intervalo',  'status' => 'intervalo'],
            ['hora' => '10:30', 'paciente' => 'Pedro Bial',     'tipo' => 'rotina',     'status' => 'confirmado'],
        ],
    ],
    'terca' => [
        'data'  => '16/06',
        'slots' => [
            ['hora' => '09:00', 'paciente' => 'Juliana Prado',     'tipo' => 'rotina',   'status' => 'confirmado'],
            ['hora' => '10:00', 'paciente' => null,                'tipo' => 'intervalo','status' => 'intervalo'],
            ['hora' => '14:00', 'paciente' => 'Fátima Bernardes',  'tipo' => 'rotina',   'status' => 'confirmado'],
        ],
    ],
    'quarta' => [
        'data'  => '17/06',
        'slots' => [
            ['hora' => '08:00', 'paciente' => 'Mariana Silva', 'tipo' => 'rotina',   'status' => 'confirmado'],
            ['hora' => '10:00', 'paciente' => null,            'tipo' => 'intervalo','status' => 'intervalo'],
            ['hora' => '10:30', 'paciente' => 'Clara Castro',  'tipo' => 'rotina',   'status' => 'confirmado'],
        ],
    ],
    'quinta' => [
        'data'  => '18/06',
        'slots' => [
            ['hora' => '09:00', 'paciente' => 'Marcos Pontes', 'tipo' => 'exame',    'status' => 'confirmado'],
            ['hora' => '10:00', 'paciente' => null,            'tipo' => 'intervalo','status' => 'intervalo'],
            ['hora' => '14:00', 'paciente' => 'César Tralli',  'tipo' => 'rotina',   'status' => 'pendente'],
        ],
    ],
    'sexta' => [
        'data'  => '19/06',
        'slots' => [
            ['hora' => '08:00', 'paciente' => 'Roberto Alencar', 'tipo' => 'rotina',   'status' => 'pendente'],
            ['hora' => '10:00', 'paciente' => null,              'tipo' => 'intervalo','status' => 'intervalo'],
            ['hora' => '10:30', 'paciente' => 'Thiago Lacerda',  'tipo' => 'rotina',   'status' => 'confirmado'],
        ],
    ],
];

// =============================================
// Cálculo dos totais
// =============================================
$total = 0;
$confirmados = 0;
$pendentes = 0;

foreach ($consultas as $dia) {
    foreach ($dia['slots'] as $slot) {
        if ($slot['status'] === 'intervalo') continue;
        $total++;
        if ($slot['status'] === 'confirmado') $confirmados++;
        if ($slot['status'] === 'pendente')   $pendentes++;
    }
}

// =============================================
// Helpers
// =============================================
function labelTipo(string $tipo): string {
    return match($tipo) {
        'retorno'  => 'Retorno',
        'eletro'   => 'Eletro',
        'exame'    => 'Exame',
        'rotina'   => 'Rotina',
        default    => ucfirst($tipo),
    };
}

function cssClassSlot(string $status): string {
    return match($status) {
        'confirmado' => 'slot-confirmado',
        'pendente'   => 'slot-pendente',
        'intervalo'  => 'slot-intervalo',
        default      => 'slot-confirmado',
    };
}

// Conjunto de todos os horários únicos para as linhas da tabela
$horariosUnicos = [];
foreach ($consultas as $dia) {
    foreach ($dia['slots'] as $slot) {
        $horariosUnicos[$slot['hora']] = $slot['hora'];
    }
}
ksort($horariosUnicos);

// Indexar consultas por [dia][hora] para lookup rápido
$lookup = [];
foreach ($consultas as $diaKey => $dia) {
    foreach ($dia['slots'] as $slot) {
        $lookup[$diaKey][$slot['hora']] = $slot;
    }
}

$diasNomes = [
    'segunda' => 'Segunda',
    'terca'   => 'Terça',
    'quarta'  => 'Quarta',
    'quinta'  => 'Quinta',
    'sexta'   => 'Sexta',
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda — <?= htmlspecialchars($medico['nome']) ?></title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #f0f4f8;
            color: #1e293b;
            min-height: 100vh;
            padding: 24px 16px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ── Header ── */
        .header {
            background: #fff;
            border-radius: 12px;
            padding: 20px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 20px;
            box-shadow: 0 1px 4px rgba(0,0,0,.07);
        }

        .header-info h1 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e40af;
        }

        .header-info p {
            font-size: .85rem;
            color: #64748b;
            margin-top: 3px;
        }

        .header-tabs {
            display: flex;
            gap: 8px;
        }

        .tab {
            padding: 8px 18px;
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 500;
            cursor: pointer;
            border: 1.5px solid transparent;
            transition: background .15s, border-color .15s;
        }

        .tab.active {
            background: #1e3a5f;
            color: #fff;
        }

        .tab:not(.active) {
            background: #fff;
            color: #1e3a5f;
            border-color: #cbd5e1;
        }

        /* ── Totais ── */
        .totais {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .card-total {
            background: #fff;
            border-radius: 12px;
            padding: 20px 24px;
            border-left: 4px solid #94a3b8;
            box-shadow: 0 1px 4px rgba(0,0,0,.07);
        }

        .card-total.azul  { border-color: #1e40af; }
        .card-total.verde { border-color: #16a34a; }
        .card-total.laranja { border-color: #d97706; }

        .card-total .label {
            font-size: .7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #94a3b8;
        }

        .card-total .valor {
            font-size: 1.9rem;
            font-weight: 800;
            margin-top: 4px;
            color: #1e293b;
        }

        /* ── Tabela ── */
        .tabela-wrapper {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 1px 4px rgba(0,0,0,.07);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        thead tr {
            background: #1e3a5f;
            color: #fff;
        }

        thead th {
            padding: 14px 10px;
            font-size: .82rem;
            font-weight: 600;
            text-align: center;
        }

        thead th:first-child {
            width: 72px;
            text-align: center;
        }

        tbody tr {
            border-bottom: 1px solid #e2e8f0;
        }

        tbody tr:last-child { border-bottom: none; }

        tbody td {
            padding: 8px 10px;
            vertical-align: top;
            height: 64px;
        }

        tbody td:first-child {
            text-align: center;
            font-size: .82rem;
            font-weight: 700;
            color: #475569;
            vertical-align: middle;
        }

        /* ── Slots ── */
        .slot {
            border-radius: 6px;
            padding: 6px 10px;
            font-size: .8rem;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .slot-confirmado {
            background: #d1fae5;
            border-left: 3px solid #16a34a;
        }

        .slot-pendente {
            background: #fef9c3;
            border-left: 3px solid #d97706;
        }

        .slot-intervalo {
            background: transparent;
            color: #94a3b8;
            font-style: italic;
            font-size: .8rem;
            justify-content: center;
            align-items: center;
        }

        .slot-hora {
            font-weight: 700;
            font-size: .78rem;
        }

        .slot-confirmado .slot-hora  { color: #166534; }
        .slot-pendente   .slot-hora  { color: #92400e; }

        .slot-nome {
            font-weight: 600;
            font-size: .83rem;
            color: #1e293b;
        }

        .slot-tipo {
            font-size: .72rem;
            color: #64748b;
        }

        .vazio { height: 64px; }

        /* ── Responsivo ── */
        @media (max-width: 700px) {
            .totais { grid-template-columns: 1fr; }
            .header { flex-direction: column; align-items: flex-start; }
            table { font-size: .75rem; }
        }
    </style>
</head>
<body>
<div class="container">

    <!-- Header -->
    <div class="header">
        <div class="header-info">
            <h1>Agenda Prática — <?= htmlspecialchars($medico['nome']) ?></h1>
            <p>Especialidade: <?= htmlspecialchars($medico['especialidade']) ?> | <?= htmlspecialchars($medico['clinica']) ?></p>
        </div>
        <div class="header-tabs">
            <span class="tab active">Visão Calendário (Médico)</span>
            <span class="tab">Todos os Agendamentos (Geral)</span>
        </div>
    </div>

    <!-- Cards de totais -->
    <div class="totais">
        <div class="card-total azul">
            <div class="label">Consultas na Semana</div>
            <div class="valor"><?= $total ?> Atendimentos</div>
        </div>
        <div class="card-total verde">
            <div class="label">Confirmados</div>
            <div class="valor"><?= $confirmados ?> Pacientes</div>
        </div>
        <div class="card-total laranja">
            <div class="label">Aguardando Confirmação</div>
            <div class="valor"><?= $pendentes ?> Pendentes</div>
        </div>
    </div>

    <!-- Tabela da agenda -->
    <div class="tabela-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Hora</th>
                    <?php foreach ($diasNomes as $key => $nome): ?>
                        <th><?= $nome ?> (<?= $consultas[$key]['data'] ?>)</th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($horariosUnicos as $hora): ?>
                <tr>
                    <td><?= htmlspecialchars($hora) ?></td>
                    <?php foreach (array_keys($diasNomes) as $diaKey): ?>
                        <td>
                            <?php if (isset($lookup[$diaKey][$hora])): ?>
                                <?php $slot = $lookup[$diaKey][$hora]; ?>
                                <?php if ($slot['status'] === 'intervalo'): ?>
                                    <div class="slot slot-intervalo">Intervalo</div>
                                <?php else: ?>
                                    <div class="slot <?= cssClassSlot($slot['status']) ?>">
                                        <span class="slot-hora"><?= htmlspecialchars($slot['hora']) ?></span>
                                        <span class="slot-nome"><?= htmlspecialchars($slot['paciente']) ?></span>
                                        <?php if (!empty($slot['tipo']) && $slot['tipo'] !== 'rotina'): ?>
                                            <span class="slot-tipo">(<?= labelTipo($slot['tipo']) ?>)</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="vazio"></div>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>