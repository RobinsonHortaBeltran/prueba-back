<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_payments', function (Blueprint $table) {
            $table->id();

            # En: Name of the payment acceptance
            # Es: Nombre de la aceptacion de pago
            $table->string('name')
                ->comment('Nombre de la aceptacion de pago');

            # En: A reference to identify the billing department for allocating cost of travel to company account.
            # Es: Una referencia para identificar el departamento de facturación para asignar el costo del viaje a la cuenta de la empresa.
            $table->string('cost_center_id',32)
                ->comment('Una referencia para identificar el departamento de facturación para asignar el costo del viaje a la cuenta de la empresa.');

            # En: Provides a reference to a specific form of payment
            # Es: Proporciona una referencia a una forma de pago específica
            $table->string('rph')
                ->comment('Proporciona una referencia a una forma de pago específica');

            # En: When true, indicates this represents a guarantee rather than a payment form
            # Es: Cuando es verdadero, indica que esto representa una garantía en lugar de una forma de pago
            $table->boolean('guarantee_indicator')
                ->default(true)
                ->comment('Cuando es verdadero, indica que esto representa una garantía en lugar de una forma de pago');

            # En: Used to specify the method of guarantee. Refer to OpenTravel Code List Payment Type (PMT)
            # Es: Se utiliza para especificar el método de garantía. Consulte el tipo de pago de la lista de códigos de OpenTravel (PMT)
            $table->string('guarantee_type_code')
                ->comment('Se utiliza para especificar el método de garantía. Consulte el tipo de pago de la lista de códigos de OpenTravel (PMT)');

            # En: Provides the identifier as specified by the GuaranteeTypeCode (e.g., Corporate ID or IATA number)
            # Es: Proporciona el identificador especificado por el GuaranteeTypeCode (por ejemplo, identificación corporativa o número IATA)
            $table->string('guarantee_id',64)
                ->comment('Proporciona el identificador especificado por el GuaranteeTypeCode (por ejemplo, identificación corporativa o número IATA)');

            # En: A remark associated with the payment form
            # Es: Un comentario asociado con el formulario de pago.
            $table->string('remark',128)
                ->comment('Un comentario asociado con el formulario de pago.');

            # En: Status field
            # Es: Campo de estado
            $table->boolean('status')
                ->default(true)
                ->comment('Campo de estado');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accepted_payments');
    }
};
