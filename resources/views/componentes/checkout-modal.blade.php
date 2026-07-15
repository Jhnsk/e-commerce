   <!-- BACKDROP -->
   <div class="checkout-backdrop" id="checkoutBackdrop"></div>

   <!-- MODAL -->
   <div class="checkout-modal" id="checkoutModal">
   
       <div class="checkout-header">
           <h2>Finalizar Pedido</h2>
   
           <button
               class="close-modal"
               id="closeModal">
               ✕
           </button>
       </div>
   
       <form action="{{route('checkout')}}" method="POST">
   
           @csrf
   
           <div class="form-group">
               <label>Nome</label>
   
               <input
                   type="text"
                   name="name"
                   placeholder="Seu nome">
           </div>
   
           <div class="form-group">
               <label>Telefone</label>
   
               <input
                   type="text"
                   name="phone"
                   placeholder="(75) 99999-9999">
           </div>
   
           <div class="form-group">
               <label>Tipo de Entrega</label>
   
               <select id="deliveryType" name="delivery_type">
                   <option value="">Selecione</option>
                   <option value="delivery">Entrega</option>
                   <option value="pickup">Retirar na Loja</option>
               </select>
           </div>
   
           <div
               class="delivery-fields"
               id="deliveryFields">
   
               <div class="form-group">
                   <label>Endereço</label>
   
                   <input
                       type="text"
                       name="address"
                       placeholder="Rua, número, bairro">
               </div>
   
               <div class="form-group">
                   <label>Referência</label>
   
                   <input
                       type="text"
                       name="reference"
                       placeholder="Ponto de referência">
               </div>
           </div>
   
           <div class="form-group">
               <label>Forma de Pagamento</label>
   
               <select name="payment_method">
                   <option>Pix</option>
                   <option>Dinheiro</option>
                   <option>Cartão</option>
               </select>
           </div>
   
           <div class="form-group">
               <label>Observação</label>
   
               <textarea
                   name="note"
                   rows="4"
                   placeholder="Alguma observação?"></textarea>
           </div>
   
           <div class="checkout-summary">
   
               <div>
                   <span>Subtotal</span>
                   <strong id="cart-total-subValue">R$ </strong>
               </div>
   
               <div>
                   <span>Entrega</span>
                   <strong>R$ 5,00</strong>
               </div>
   
               <div class="summary-total">
                   <span>Total</span>
                   <strong id="cart-total-value">R$ </strong>
               </div>
   
           </div>
   
           <button 
               type="submit"
               class="confirm-order-btn">
   
               Confirmar Pedido
   
           </button>
   
       </form>
   
   </div>