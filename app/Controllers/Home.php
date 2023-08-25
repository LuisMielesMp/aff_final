<?php


namespace App\Controllers;
// use App\Models

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    } 
    

    public function prueba ()
    {
        echo 'hola esto es una prueba';
    }

    public function api()
    {
        $noticiasInforma = array(
            array(
                "titulo" => "Más de 40 descargas de agua contaminada llegan a los ríos Malacatos y Zamora",
                "contenido" => "Los ríos Zamora y Malacatos, que cruzan el casco céntrico de la ciudad de Loja, están contaminados debido a numerosas descargas de aguas servidas. Se han identificado alrededor de 40 puntos de descarga directa e indirecta de aguas contaminadas, incluyendo un desagüe en el puente de la calle Imbabura y la avenida Manuel Agustín Aguirre, frente al parque Simón Bolívar, que presenta agua amarillenta con sedimentos y presencia de roedores. Las autoridades están trabajando en varios proyectos para recuperar estos ríos y mejorar su calidad...",
                "fecha" => "2023-07-06",
                "fuente" => "Crónica",
                "url" => "https://cronica.com.ec/2023/07/06/mas-de-40-descargas-de-agua-contaminada-llegan-a-los-rios-malacatos-y-zamora/"
            ),
            array(
                "titulo" => "¿Qué es el fenómeno El Niño, por qué ocurre y qué efectos puede producir?",
                "contenido" => "El Niño es un fenómeno climático natural en el océano Pacífico tropical con aguas más cálidas de lo normal. Tiene una amplia influencia en el clima mundial y afecta a millones de personas. Ocurre cada dos a siete años, y las aguas del Pacífico oriental pueden estar hasta 4 grados Celsius más cálidas....",
                "fecha" => "2023-07-05",
                "fuente" => "CNN",
                "url" => "https://cnnespanol.cnn.com/2023/07/05/que-es-nino-fenomeno-por-que-ocurre-efectos-trax/"
            ),
            array(
                "titulo" => "Consulte su lugar de votación para las elecciones del 20 de agosto en Ecuador ",
                "contenido" => "Para las elecciones presidenciales en Ecuador el 20 de agosto de 2023, se habilitó la consulta del lugar de votación. La mayoría de los ciudadanos mantendrán el mismo lugar de votación que en las elecciones anteriores. Sin embargo, algunos recintos podrían cambiar debido a daños por el clima o por procesos de reconstrucción o remodelación....",
                "fecha" => "2023-07-07",
                "fuente" => "Primicias",
                "url" => "https://www.primicias.ec/noticias/elecciones-presidenciales-2023/consultar-lugar-votacion-mesa-recinto/"
            )
        );
    
        
        return $this->response->setJSON($noticiasInforma);
        
    }


    
    
    public function login(){

return view('login');

    
    }

  
  
        
            public function testbd()
            {
                $this->db = \Config\Database::connect();
            
                $query = $this->db->query("SELECT id, titulo, contenido, fecha, fuente, url FROM noticias");
            
                $result = $query->getResult();
            
                $output = '<html>
                <head>
                    <title>Noticias</title>
                    <style>
                        body {
                            font-family: "Times New Roman", Times, serif;
                            background-color: #f5f5f5;
                            padding: 20px;
                        }
                        .noticias-table {
                            border-collapse: collapse;
                            width: 80%;
                            margin: 20px auto;
                            background-color: #fff;
                            border-radius: 10px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            overflow: hidden;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 12px;
                            text-align: left;
                            text-align: justify;
                        }
                        th {
                            background-color: #3498db;
                            color: #fff;
                        }
                        tr:nth-child(even) {
                            background-color: #f2f2f2;
                        }
                        a {
                            color: #e74c3c;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                    <h1 style="text-align: center; color: #3498db;">Noticias</h1>
                    <table class="noticias-table">
                        <thead>
                            <tr>
                                <th>ID</th> <!-- Agregamos la columna ID -->
                                <th>Título</th>
                                <th>Contenido</th>
                                <th>Fecha</th>
                                <th>Fuente</th>
                                <th>URL</th>
                            </tr>
                        </thead>
                        <tbody>';
            
                foreach ($result as $row) {
                    $output .= '<tr>';
                    $output .= '<td>' . htmlspecialchars($row->id) . '</td>'; // Mostramos el campo ID
                    $output .= '<td>' . htmlspecialchars($row->titulo) . '</td>';
                    $output .= '<td>' . htmlspecialchars($row->contenido) . '</td>';
                    $output .= '<td>' . htmlspecialchars($row->fecha) . '</td>';
                    $output .= '<td>' . htmlspecialchars($row->fuente) . '</td>';
                    $output .= '<td><a href="' . htmlspecialchars($row->url) . '">' . htmlspecialchars($row->url) . '</a></td>';
                    $output .= '</tr>';
                }
            
                $output .= '</tbody>
                    </table>
                </body>
                </html>';
            
                return $this->response->setBody($output);
            }
            
            public function eliminarNoticia($id)
            {
                $db = \Config\Database::connect();
        
                // Eliminar la noticia con el ID proporcionado
                $db->table('noticias')->where('id', $id)->delete();
        
                $response = [
                    'message' => 'Datos borrados correctamente'
                ];
        
                return $this->response->setJSON($response);
            }
        
            public function agregarDato()
            {
                $data = $this->request->getJSON(true); // Obtener los datos enviados en la solicitud POST en formato JSON
        
                // Lógica para agregar los datos a la base de datos
                $db = \Config\Database::connect();
                $db->table('noticias')->set($data)->insert();
        
                // Retornar una respuesta apropiada
                $response = [
                    'message' => 'Datos agregados correctamente'
                ];
        
                return $this->response->setJSON($response);
            }
        
            public function actualizarDato($id)
            {
                $data = $this->request->getJSON(true); // Obtener los datos enviados en la solicitud POST en formato JSON
        
                // Lógica para actualizar los datos en la base de datos
                $db = \Config\Database::connect();
                $db->table('noticias')->set($data)->where('id', $id)->update();
        
                // Retornar una respuesta apropiada
                $response = [
                    'message' => 'Datos actualizados correctamente'
                ];
        
                return $this->response->setJSON($response);
            }
            
        }

  
  
    



//USANDO POSTMAN.


#BORRAR DATOS DELETE
#http://localhost/ci4/testbd/1                 //El numero 1 es el id que se desea borrar


#AGREGAR DATOS  POST
#http://localhost/ci4/testbd/agregar-dato             //Agregar datos

/*#1
{
    "id": "1",
    "titulo": "Más de 40 descargas de agua contaminada llegan a los ríos Malacatos y Zamora",
    "contenido": "Los ríos Zamora y Malacatos, que cruzan el casco céntrico de la ciudad de Loja, están contaminados debido a numerosas descargas de aguas servidas. Se han identificado alrededor de 40 puntos de descarga directa e indirecta de aguas contaminadas, incluyendo un desagüe en el puente de la calle Imbabura y la avenida Manuel Agustín Aguirre, frente al parque Simón Bolívar, que presenta agua amarillenta con sedimentos y presencia de roedores. Las autoridades están trabajando en varios proyectos para recuperar estos ríos y mejorar su calidad...",
    "fecha": "2023-07-06",
    "fuente": "Crónica",
    "url": "https://cronica.com.ec/2023/07/06/mas-de-40-descargas-de-agua-contaminada-llegan-a-los-rios-malacatos-y-zamora/"
}
*/

/*#2
{
    "id": "2",
    "titulo": "¿Qué es el fenómeno El Niño, por qué ocurre y qué efectos puede producir?",
    "contenido": "El Niño es un fenómeno climático natural en el océano Pacífico tropical con aguas más cálidas de lo normal. Tiene una amplia influencia en el clima mundial y afecta a millones de personas. Ocurre cada dos a siete años, y las aguas del Pacífico oriental pueden estar hasta 4 grados Celsius más cálidas....",
    "fecha": "2023-07-05",
    "fuente": "CNN",
    "url": "https://cnnespanol.cnn.com/2023/07/05/que-es-nino-fenomeno-por-que-ocurre-efectos-trax/"
}
*/

/*#3
{
    "id": "3",
    "titulo": "Consulte su lugar de votación para las elecciones del 20 de agosto en Ecuador",
    "contenido": "Para las elecciones presidenciales en Ecuador el 20 de agosto de 2023, se habilitó la consulta del lugar de votación. La mayoría de los ciudadanos mantendrán el mismo lugar de votación que en las elecciones anteriores. Sin embargo, algunos recintos podrían cambiar debido a daños por el clima o por procesos de reconstrucción o remodelación....",
    "fecha": "2023-07-07",
    "fuente": "Primicias",
    "url": "https://www.primicias.ec/noticias/elecciones-presidenciales-2023/consultar-lugar-votacion-mesa-recinto/"
}
*/



#ACTUALIZAR DATOS PUT
#http://localhost/ci4/noticias/actualizar/1     //El numero 1 es el id que se desea actualizar