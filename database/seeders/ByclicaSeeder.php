<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;
use App\Models\Bicicleta;
use App\Models\Cliente;
use App\Models\Reserva;
use App\Models\Pagamento;

class ByclicaSeeder extends Seeder
{
    public function run()
    {
        // Categorias
        $categorias = [
            ['nome' => 'Urbana', 'descricao' => 'Bicicletas ideais para a cidade', 'icone' => '🏙️'],
            ['nome' => 'Mountain Bike', 'descricao' => 'Para trilhos e terrenos difíceis', 'icone' => '⛰️'],
            ['nome' => 'Elétrica', 'descricao' => 'Bicicletas com assistência elétrica', 'icone' => '⚡'],
            ['nome' => 'Infantil', 'descricao' => 'Para os mais pequenos', 'icone' => '👶'],
            ['nome' => 'Corrida', 'descricao' => 'Alta performance para competição', 'icone' => '🏁'],
            ['nome' => 'Cruiser', 'descricao' => 'Conforto e estilo para passeios', 'icone' => '🌅'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }

        // Bicicletas
        $bicicletas = [
            ['nome' => 'City Rider 1', 'marca' => 'Trek', 'modelo' => 'FX3', 'numero_serie' => 'TRK001', 'categoria_id' => 1, 'preco_hora' => 5.00, 'preco_dia' => 25.00, 'estado' => 'disponivel', 'cor' => 'Azul', 'tamanho' => 'M'],
            ['nome' => 'City Rider 2', 'marca' => 'Trek', 'modelo' => 'FX3', 'numero_serie' => 'TRK002', 'categoria_id' => 1, 'preco_hora' => 5.00, 'preco_dia' => 25.00, 'estado' => 'disponivel', 'cor' => 'Vermelho', 'tamanho' => 'L'],
            ['nome' => 'Mountain Pro', 'marca' => 'Giant', 'modelo' => 'Talon 3', 'numero_serie' => 'GNT001', 'categoria_id' => 2, 'preco_hora' => 8.00, 'preco_dia' => 35.00, 'estado' => 'disponivel', 'cor' => 'Preto', 'tamanho' => 'M'],
            ['nome' => 'Mountain Pro X', 'marca' => 'Giant', 'modelo' => 'Talon 2', 'numero_serie' => 'GNT002', 'categoria_id' => 2, 'preco_hora' => 10.00, 'preco_dia' => 45.00, 'estado' => 'alugada', 'cor' => 'Verde', 'tamanho' => 'L'],
            ['nome' => 'E-Bike City', 'marca' => 'Specialized', 'modelo' => 'Turbo Como', 'numero_serie' => 'SPZ001', 'categoria_id' => 3, 'preco_hora' => 12.00, 'preco_dia' => 55.00, 'estado' => 'disponivel', 'cor' => 'Branco', 'tamanho' => 'M'],
            ['nome' => 'E-Bike Trail', 'marca' => 'Specialized', 'modelo' => 'Turbo Levo', 'numero_serie' => 'SPZ002', 'categoria_id' => 3, 'preco_hora' => 15.00, 'preco_dia' => 70.00, 'estado' => 'manutencao', 'cor' => 'Cinza', 'tamanho' => 'L'],
            ['nome' => 'Mini Rider', 'marca' => 'Trek', 'modelo' => 'Precaliber 20', 'numero_serie' => 'TRK003', 'categoria_id' => 4, 'preco_hora' => 3.00, 'preco_dia' => 15.00, 'estado' => 'disponivel', 'cor' => 'Rosa', 'tamanho' => 'S'],
            ['nome' => 'Speed Racer', 'marca' => 'Cannondale', 'modelo' => 'CAAD13', 'numero_serie' => 'CND001', 'categoria_id' => 5, 'preco_hora' => 10.00, 'preco_dia' => 50.00, 'estado' => 'disponivel', 'cor' => 'Preto', 'tamanho' => 'M'],
            ['nome' => 'Beach Cruiser', 'marca' => 'Electra', 'modelo' => 'Townie 7D', 'numero_serie' => 'ELC001', 'categoria_id' => 6, 'preco_hora' => 6.00, 'preco_dia' => 30.00, 'estado' => 'disponivel', 'cor' => 'Turquesa', 'tamanho' => 'M'],
            ['nome' => 'Classic Tour', 'marca' => 'Raleigh', 'modelo' => 'Pioneer', 'numero_serie' => 'RLG001', 'categoria_id' => 1, 'preco_hora' => 4.00, 'preco_dia' => 20.00, 'estado' => 'disponivel', 'cor' => 'Castanho', 'tamanho' => 'M'],
        ];

        foreach ($bicicletas as $bic) {
            Bicicleta::create($bic);
        }

        // Clientes
        $clientes = [
            ['nome' => 'João Silva', 'email' => 'joao.silva@email.com', 'telefone' => '912345678', 'cidade' => 'Lisboa'],
            ['nome' => 'Maria Santos', 'email' => 'maria.santos@email.com', 'telefone' => '923456789', 'cidade' => 'Porto'],
            ['nome' => 'Pedro Costa', 'email' => 'pedro.costa@email.com', 'telefone' => '934567890', 'cidade' => 'Coimbra'],
            ['nome' => 'Ana Ferreira', 'email' => 'ana.ferreira@email.com', 'telefone' => '945678901', 'cidade' => 'Braga'],
            ['nome' => 'Carlos Oliveira', 'email' => 'carlos.oliveira@email.com', 'telefone' => '956789012', 'cidade' => 'Faro'],
            ['nome' => 'Sofia Martins', 'email' => 'sofia.martins@email.com', 'telefone' => '967890123', 'cidade' => 'Aveiro'],
            ['nome' => 'Rui Pereira', 'email' => 'rui.pereira@email.com', 'telefone' => '978901234', 'cidade' => 'Setúbal'],
            ['nome' => 'Inês Rodrigues', 'email' => 'ines.rodrigues@email.com', 'telefone' => '989012345', 'cidade' => 'Évora'],
            ['nome' => 'Miguel Fernandes', 'email' => 'miguel.fernandes@email.com', 'telefone' => '910123456', 'cidade' => 'Viseu'],
            ['nome' => 'Catarina Lopes', 'email' => 'catarina.lopes@email.com', 'telefone' => '921234567', 'cidade' => 'Leiria'],
        ];

        foreach ($clientes as $cli) {
            Cliente::create($cli);
        }

        // Reservas
        $reservas = [
            ['cliente_id' => 1, 'bicicleta_id' => 1, 'data_inicio' => now()->subDays(5), 'data_fim' => now()->subDays(3), 'tipo' => 'dia', 'estado' => 'concluida', 'valor_total' => 50.00],
            ['cliente_id' => 2, 'bicicleta_id' => 4, 'data_inicio' => now()->subDays(2), 'data_fim' => now()->addDay(), 'tipo' => 'dia', 'estado' => 'ativa', 'valor_total' => 105.00],
            ['cliente_id' => 3, 'bicicleta_id' => 3, 'data_inicio' => now()->addDays(2), 'data_fim' => now()->addDays(4), 'tipo' => 'dia', 'estado' => 'pendente', 'valor_total' => 70.00],
            ['cliente_id' => 4, 'bicicleta_id' => 5, 'data_inicio' => now()->subDays(10), 'data_fim' => now()->subDays(8), 'tipo' => 'dia', 'estado' => 'concluida', 'valor_total' => 110.00],
            ['cliente_id' => 5, 'bicicleta_id' => 2, 'data_inicio' => now()->addDay(), 'data_fim' => now()->addDays(3), 'tipo' => 'dia', 'estado' => 'pendente', 'valor_total' => 50.00],
            ['cliente_id' => 6, 'bicicleta_id' => 8, 'data_inicio' => now()->subDays(1), 'data_fim' => now()->addDays(1), 'tipo' => 'dia', 'estado' => 'ativa', 'valor_total' => 100.00],
            ['cliente_id' => 7, 'bicicleta_id' => 9, 'data_inicio' => now()->subDays(3), 'data_fim' => now()->subDays(1), 'tipo' => 'dia', 'estado' => 'concluida', 'valor_total' => 60.00],
            ['cliente_id' => 8, 'bicicleta_id' => 7, 'data_inicio' => now()->addDays(3), 'data_fim' => now()->addDays(5), 'tipo' => 'dia', 'estado' => 'pendente', 'valor_total' => 30.00],
        ];

        foreach ($reservas as $res) {
            Reserva::create($res);
        }

        // Pagamentos
        Pagamento::create(['reserva_id' => 1, 'valor' => 50.00, 'metodo' => 'cartao', 'estado' => 'pago']);
        Pagamento::create(['reserva_id' => 2, 'valor' => 105.00, 'metodo' => 'mbway', 'estado' => 'pago']);
        Pagamento::create(['reserva_id' => 4, 'valor' => 110.00, 'metodo' => 'dinheiro', 'estado' => 'pago']);
        Pagamento::create(['reserva_id' => 6, 'valor' => 100.00, 'metodo' => 'transferencia', 'estado' => 'pendente']);
        Pagamento::create(['reserva_id' => 7, 'valor' => 60.00, 'metodo' => 'cartao', 'estado' => 'pago']);
    }
}