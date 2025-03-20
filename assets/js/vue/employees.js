Vue.component('paginate', VuejsPaginate);

const employeeMethods = {
    data() {
        return {
            employees: [],
            currentPage: 1,
            perPage: 5,
            totalPages: 0,
            searchQuery: "",
            isEditing: false,
            passwordFieldType: "password",
            emailError: "",
            birthdateError: "",
            formData: {
                employee_id: null,
                employee_name: "",
                last_name: "",
                email: "",
                birthdate: "",
                department_id: "",
                hiring_date: "",
                role_id: "",
                password: ""
            },
            role_id_employee:"",
            employee_log_name: "",
        };
    },
    methods: {
        get_employee_role() {
            this.role_id_employee= localStorage.getItem("role_id");
            console.log(this.role_id_employee);
        },
        get_employees(page = 1) {
            let offset = (page - 1) * this.perPage;
            let data = { 
                offset: offset, 
                limit: this.perPage,
                search: this.searchQuery
            };
    
            $.get(SITE_URL + "/employees/get_all_employees", data, (resp) => {
                resp = JSON.parse(resp);
                this.employees = resp.employees;                
                this.totalPages = Math.ceil(resp.total / this.perPage);
            });
        },
        searchEmployees() {
            this.currentPage = 1;
            this.get_employees();
        },
        goToPage(page) {
            this.currentPage = page;
            this.get_employees(page);
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.goToPage(this.currentPage - 1);
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.goToPage(this.currentPage + 1);
            }
        },  
        openModal(employee_id = null) {
            if (employee_id) {
                $.get(SITE_URL + "/employees/get_employee_by_id/" + employee_id, (resp) => {
                    resp = JSON.parse(resp);
                    
                    console.log("resp:"+resp.data.employee_name);

                    this.formData = resp.data;
        
                    this.formDataBefore = JSON.parse(JSON.stringify(resp.data));


                    this.originalEmail = resp.data.email;
    
                    this.formData.password = "";
        
                    this.isEditing = true;

                    console.log("formData:"+this.formData);
                    
                    console.log("originalEmail:"+this.originalEmail);
                    $("#employeeModal").modal("show");
                });
            } else {                
                this.formData = {
                    employee_name: "",
                    last_name: "",
                    email: "",
                    birthdate: "",
                    department_id: "",
                    hiring_date: "",
                    role_id: "",
                    password: ""
                };
        
                this.originalEmail = "";
        
                this.isEditing = false;
                $("#employeeModal").modal("show");
            }
        },     
        togglePassword() {
            this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
        },
        // validateEmail() {
        //     let email = this.formData.email;
        
        //     if (!email || email.trim().length === 0) {
        //         console.log("formdata_email2: 0 (Campo vacío o null)");
        //         this.emailError = "";
        //         return;
        //     }
        
        //     if (this.isEditing && email.trim() === this.originalEmail) {
        //         console.log("Email no ha cambiado, no validar");
        //         this.emailError = "";
        //         return;
        //     }
        
        //     console.log("Validando email:", email);
        
        //     $.get(SITE_URL + "/employees/check_email", { email: email.trim() }, (resp) => {
        //         resp = JSON.parse(resp);
        //         this.emailError = resp.exists ? "El correo electrónico ya está registrado." : "";
        //     });
        // },        
        validateBirthdate() {
            let birthdate = new Date(this.formData.birthdate);
            let today = new Date();
            let age = today.getFullYear() - birthdate.getFullYear();
            if (today < new Date(birthdate.setFullYear(birthdate.getFullYear() + age))) {
                age--;
            }
            this.birthdateError = age < 18 ? "El empleado debe ser mayor de 18 años." : "";
        },
        // saveEmployee() {
        //     if(this.isEditing === true) {                
        //         if (this.formDataBefore.employee_name == this.formData.employee_name 
        //             && this.formDataBefore.last_name == this.formData.last_name
        //             && this.formDataBefore.email == this.formData.email
        //             && this.formDataBefore.birthdate == this.formData.birthdate
        //             && this.formDataBefore.department_id == this.formData.department_id
        //             && this.formDataBefore.hiring_date == this.formData.hiring_date
        //             && this.formDataBefore.role_id == this.formData.role_id
        //             && this.formData.password == ""
        //         ){
        //             window.location.href = SITE_URL+"/employees";
        //             return;
        //         }
        //         if (this.formDataBefore.employee_name == this.formData.employee_name ){
        //             delete this.formData.employee_name;
        //         }
        //         if (this.formDataBefore.last_name == this.formData.last_name){
        //             delete this.formData.last_name;
        //         }
        //         if (this.formDataBefore.birthdate == this.formData.birthdate){
        //             delete this.formData.birthdate;
        //         }
        //         if (this.formDataBefore.department_id == this.formData.department_id){
        //             delete this.formData.department_id;
        //         }
        //         if (this.formDataBefore.hiring_date == this.formData.hiring_date){
        //             delete this.formData.hiring_date;
        //         }
        //         if (this.formDataBefore.role_id == this.formData.role_id){
        //             delete this.formData.role_id;
        //         }

        //         let email = this.formData.email;

        //         if(this.formData.password == "") {
        //             delete this.formData.password;
        //         }
            
        //         if (this.isEditing && email.trim() === this.originalEmail) {
        //             console.log("Email no ha cambiado, no validar");
        //             this.emailError = "";
        //             delete this.formData.email;
        //         }else{
        //             console.log("Validando email:", email);
            
        //             $.get(SITE_URL + "/employees/check_email", { email: email.trim() }, (resp) => {
        //                 resp = JSON.parse(resp);
        //                 this.emailError = resp.exists ? "El correo electrónico ya está registrado." : "";
        //             });
        //         }                
        //     }else{
        //         $.get(SITE_URL + "/employees/check_email", { email: email.trim() }, (resp) => {
        //             resp = JSON.parse(resp);
        //             this.emailError = resp.exists ? "El correo electrónico ya está registrado." : "";
        //         });
        //     }

        //     if (this.emailError || this.birthdateError) return;
    
        //     let url = this.isEditing ? SITE_URL + "/employees/update/" + this.formData.employee_id : SITE_URL + "/employees/store";
        //     let method = this.isEditing ? "PUT" : "POST";
    
        //     console.log("formDatapassword: " + this.formData.password);
        //     console.log("formDataemail: " + this.formData.email);
        //     $.ajax({
        //         url: url,
        //         method: method,
        //         data: this.formData,
        //         success: (resp) => {
        //             resp = JSON.parse(resp);
        //             if (resp.success) {
        //                 $("#employeeModal").modal("hide");
        //                 this.get_employees(this.currentPage);
        //             } else {
        //                 alert("Error: " + resp.message);
        //             }
        //         }
        //     });
        // },
        async validateEmail() {
            if (!this.formData.email || this.formData.email.trim() === "") return true; // Si el email está vacío, lo consideramos válido
            return new Promise((resolve) => {
                $.get(SITE_URL + "/employees/check_email", { email: this.formData.email.trim() }, (resp) => {
                    resp = JSON.parse(resp);
                    this.emailError = resp.exists ? "El correo electrónico ya está registrado." : "";
                    resolve(!resp.exists); // Devuelve true si el email es válido
                });
            });
        },    
        // async saveEmployee() {
        //     if (this.isEditing) { 
        //         // Si no se ha cambiado ningún dato, redirige a employees
        //         // if (
        //         //     this.formDataBefore.employee_name === this.formData.employee_name &&
        //         //     this.formDataBefore.last_name === this.formData.last_name &&
        //         //     this.formDataBefore.email === this.formData.email &&
        //         //     this.formDataBefore.birthdate === this.formData.birthdate &&
        //         //     this.formDataBefore.department_id === this.formData.department_id &&
        //         //     this.formDataBefore.hiring_date === this.formData.hiring_date &&
        //         //     this.formDataBefore.role_id === this.formData.role_id &&
        //         //     this.formData.password === ""
        //         // ) {
        //         //     window.location.href = SITE_URL + "/employees";
        //         //     return;
        //         // }
    
        //         // Eliminar los campos que no han cambiado antes de enviar el formulario
        //         ["employee_name", "last_name", "birthdate", "department_id", "hiring_date", "role_id"].forEach(field => {
        //             if (this.formDataBefore[field] === this.formData[field]) {
        //                 delete this.formData[field];
        //             }
        //         });
    
        //         if (this.formData.password === "") {
        //             delete this.formData.password;
        //         }
    
        //         // Validación de email si se cambió
        //         if (this.formData.email.trim() === this.originalEmail) {
        //             this.emailError = "";
        //             delete this.formData.email;
        //         } else {
        //             let emailValid = await this.validateEmail();
        //             if (!emailValid) return;
        //         }
        //     } else {
        //         // Validación de email para nuevos registros
        //         let emailValid = await this.validateEmail();
        //         if (!emailValid) return;
        //     }
    
        //     // Si hay errores en email o fecha de nacimiento, detener el proceso
        //     if (this.emailError || this.birthdateError) return;
    
        //     let url = this.isEditing ? `${SITE_URL}/employees/update/${this.formData.employee_id}` : `${SITE_URL}/employees/store`;
        //     let method = this.isEditing ? "PUT" : "POST";

        //     console.log("Datos antes de enviar:", JSON.stringify(this.formData));

        //     $.ajax({
        //         url: url,
        //         method: method,
        //         data: this.formData,
        //         success: (resp) => {
        //             resp = JSON.parse(resp);
        //             console.log("Respuesta del servidor:", resp);

        //             if (resp.success) {
        //                 $("#employeeModal").modal("hide");
        //                 this.get_employees(this.currentPage);
        //             } else {
        //                 alert("Error: " + resp.message);
        //             }
        //         }
        //     });
        // },    
        saveEmployee() {           

            console.log("Datos antes de filtro formData:", JSON.stringify(this.formData));
            console.log("Datos antes de filtro formDataBefore:", JSON.stringify(this.formData));
            if (this.isEditing) {
                let hasChanges = false;
                let fields = ["employee_name", "last_name", "email", "birthdate", "department_id", "hiring_date", "role_id"];
        
                fields.forEach(field => {
                    if (this.formDataBefore[field] !== this.formData[field]) {
                        hasChanges = true;
                    } else {
                        delete this.formData[field];
                    }
                });
        
                if (!hasChanges) {
                    console.log("No hay cambios en los datos, redirigiendo...");
                    window.location.href = SITE_URL + "/employees";
                    return;
                }
        
                if (this.formData.password === "") {
                    delete this.formData.password;
                }

                if (this.formData.email) {
                    console.log("Validando email:", this.formData.email);
            
                    $.get(SITE_URL + "/employees/check_email", { email: this.formData.email.trim() }, (resp) => {
                        resp = JSON.parse(resp);
                        this.emailError = resp.exists ? "El correo electrónico ya está registrado." : "";
                    });
                }
        
            }else{
                console.log("Validando email:", this.formData.email);
            
                $.get(SITE_URL + "/employees/check_email", { email: this.formData.email.trim() }, (resp) => {
                    resp = JSON.parse(resp);
                    this.emailError = resp.exists ? "El correo electrónico ya está registrado." : "";
                });
            }
            console.log("Datos antes de enviar:", JSON.stringify(this.formData));

            // Si hay errores en email o fecha de nacimiento, detener el proceso
            if (this.emailError || this.birthdateError) return;

            let url = this.isEditing ? `${SITE_URL}/employees/update/${this.formData.employee_id}` : `${SITE_URL}/employees/store`;
            let method = this.isEditing ? "PUT" : "POST";


            $.ajax({
                url: url,
                method: method,
                data: JSON.stringify(this.formData),
                contentType: "application/json", // 🔹 Importante para que llegue como JSON
                processData: false,
                success: (resp) => {
                    resp = JSON.parse(resp);        
                    
                    if (resp.success) {
                        $("#employeeModal").modal("hide");
                        this.get_employees(this.currentPage);
                    } else {
                        alert("Error al actualizar el empleado.");
                    }
                }
            });

            // $.ajax({
            //     url: SITE_URL + "/employees/update/" + this.formData.employee_id,
            //     method: "POST",
            //     data: this.formData,
            //     success: (resp) => {
            //         console.log("Respuesta del servidor:", resp);
            //         resp = JSON.parse(resp);
            //         if (resp.success) {
            //             $("#employeeModal").modal("hide");
            //             this.get_employees(this.currentPage);
            //         } else {
            //             alert("Error al actualizar el empleado.");
            //         }
            //     }
            // });
        },    
        deleteEmployee(id) {
            if (confirm("¿Estás seguro de eliminar este empleado?")) {
                $.ajax({
                    url: SITE_URL + "/employees/delete/" + id,
                    method: "DELETE",
                    success: (resp) => {
                        resp = JSON.parse(resp);
                        if (resp.success) {
                            this.get_employees(this.currentPage);
                        } else {
                            alert("Error: " + resp.message);
                        }
                    }
                });
            }
        },
    },
    mounted() {
        this.get_employee_role ();
        this.get_employees();
    }
};

var app1 = new Vue({
    el: "#employeeApp",
    mixins: [employeeMethods]
});
