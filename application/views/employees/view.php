<!-- Vista de Lista de Empleados: list.php -->

<?php $this->load->view("header"); ?>

<div class="container mt-5" id="employeeApp">
    <h2 class="mb-4">Lista de Empleados</h2>

    <button class="btn btn-primary mb-3" @click="openModal()">Agregar Empleado</button>

    <div class="mb-3">
      <input type="text" v-model="searchQuery" class="form-control" placeholder="Buscar por nombre, apellido o departamento..." @input="searchEmployees">
    </div>


    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Fecha Nacimiento</th>
          <th>Departamento</th>
          <th>Fecha Contratación</th>
          <th>Rol</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(employee, index) in employees":key="employee.employee_id">
          <td>{{ employee.employee_id }}</td>
          <td>{{ employee.employee_name }}</td>
          <td>{{ employee.last_name }}</td>
          <td>{{ employee.email }}</td>
          <td>{{ employee.birthdate }}</td>
          <td>{{ employee.department_name }}</td>
          <td>{{ employee.hiring_date }}</td>
          <td>{{ employee.role_name }}</td>
          <td>
            <button v-if="role_id_employee == 1" class="btn btn-warning btn-sm me-2" @click="openModal(employee.employee_id)">Editar</button>
            <button v-if="role_id_employee == 1 && user_id_employee != employee.employee_id" class="btn btn-danger btn-sm" @click="deleteEmployee(employee.employee_id)">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Paginación -->
    <nav>
      <ul class="pagination">
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <button class="page-link" @click="prevPage">Anterior</button>
        </li>
        <li class="page-item" v-for="page in totalPages" :key="page" :class="{ active: currentPage === page }">
          <button class="page-link" @click="goToPage(page)">{{ page }}</button>
        </li>
        <li class="page-item" :class="{ disabled: currentPage === totalPages }">
          <button class="page-link" @click="nextPage">Siguiente</button>
        </li>
      </ul>
    </nav>

    <!-- Modal para Crear/Editar -->
    <div class="modal fade" id="employeeModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ isEditing ? 'Editar Empleado' : 'Agregar Empleado' }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="saveEmployee">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" v-model="formData.employee_name" required>
                <label>Nombre</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" v-model="formData.last_name" required>
                <label>Apellido</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" v-model="formData.email" required autocomplete="off">
                <label>Email</label>
                <small v-if="emailError" class="text-danger">{{ emailError }}</small>
              </div>
              <div class="form-floating mb-3">
                <input type="date" class="form-control" v-model="formData.birthdate" required @change="validateBirthdate">
                <label>Fecha de Nacimiento</label>
                <small v-if="birthdateError" class="text-danger">{{ birthdateError }}</small>
              </div>
              <div class="form-floating mb-3">
                <select class="form-control" v-model="formData.department_id" required>
                  <option value="">Seleccione</option>
                  <option value="1">Recursos Humanos</option>
                  <option value="2">Finanzas</option>
                  <option value="3">Tecnología de la Información</option>
                  <option value="4">Ventas</option>
                  <option value="5">Marketing</option>
                  <option value="6">Atención al Cliente</option>
                  <option value="7">Logística</option>
                  <option value="8">Producción</option>
                  <option value="9">Investigación y Desarrollo</option>
                  <option value="10">Administración</option>
                </select>
                <label>Departamento</label>
              </div>
              <div class="form-floating mb-3">
                <input type="date" class="form-control" v-model="formData.hiring_date" required>
                <label>Fecha de Contratación</label>
              </div>
              <div class="form-floating mb-3">
                <select class="form-control" v-model="formData.role_id" required>
                  <option value="1">Administrador</option>
                  <option value="2">Empleado</option>
                </select>
                <label>Rol</label>
              </div>
              <div class="form-floating mb-3 position-relative">
                <input :type="passwordFieldType" class="form-control" v-model="formData.password" :required="!isEditing">
                <label>Contraseña</label>
                <span class="position-absolute top-50 end-0 translate-middle-y me-3" @click="togglePassword" style="cursor: pointer;">
                    <i :class="passwordFieldType === 'password' ? 'fa-solid fa-eye' : 'fa-solid fa-eye-slash'"></i>
                </span>
              </div>
              <button type="submit" class="btn btn-success w-100">Guardar</button>
            </form>
          </div>
        </div>
      </div>
    </div>

</div>

<script src="<?php echo base_url('assets/js/jquery-3.7.1.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/vue.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/vuejs-paginate.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/vue/employees.js');?>"></script>

<?php $this->load->view("footer");?>
