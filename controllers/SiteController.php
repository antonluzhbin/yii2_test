<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Book;
use app\models\Reader;
use app\models\Author;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        //return $this->render('index');
        return $this->actionBook();
    }

    /*public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }*/
    
    public function actionBook()
    {
        $book = new Book;
        $data = $book->find()->all();
    
        return $this->render('book', array(
            'data' => $data
        ));
    }
    
    public function actionCreatebook()
    {
        $model = new Book;
        if (isset($_POST['Book']))
        {
            $model->name = $_POST['Book']['name'];

            if ($model->save())
            {
                Yii::$app->response->redirect(array('site/book', 'id' => $model->id));
                return;
            }
        }

        echo $this->render('createbook', array(
            'model' => $model
        ));
    }
        
    public function actionUpdatebook($id=NULL)
    {
        if ($id === NULL)
            throw new HttpException(404, 'Not Found');

        $model = Book::find()->where(['id' => $id])->one();

        if ($model === NULL)
            throw new HttpException(404, 'Document Does Not Exist');

        if (isset($_POST['Book']))
        {
            $model->name = $_POST['Book']['name'];

            if ($model->save())
            {
                Yii::$app->response->redirect(array('site/book', 'id' => $model->id));
                return;
            }
        }

        echo $this->render('createbook', array(
            'model' => $model
        ));
    }
    
    public function actionDeletebook($id=NULL)
    {
        if ($id === NULL)
        {
            Yii::$app->session->setFlash('BookDeletedError');
            Yii::$app->getResponse()->redirect(array('site/book'));
        }

        $book = Book::find()->where(['id' => $id])->one();

        if ($book === NULL)
        {
            Yii::$app->session->setFlash('BookDeletedError');
            Yii::$app->getResponse()->redirect(array('site/book'));
        }

        $book->delete();

        Yii::$app->session->setFlash('BookDeleted');
        Yii::$app->getResponse()->redirect(array('site/book'));
    }
    
    public function actionReader()
    {
        $reader = new Reader;
        $data = $reader->find()->all();
    
        return $this->render('reader', array(
            'data' => $data
        ));
    }
    
    public function actionCreatereader()
    {
        $model = new Reader;
        if (isset($_POST['Reader']))
        {
            $model->name = $_POST['Reader']['name'];

            if ($model->save())
            {
                Yii::$app->response->redirect(array('site/reader', 'id' => $model->id));
                return;
            }
        }

        echo $this->render('createreader', array(
            'model' => $model
        ));
    }
        
    public function actionUpdatereader($id=NULL)
    {
        if ($id === NULL)
            throw new HttpException(404, 'Not Found');

        $model = Reader::find()->where(['id' => $id])->one();

        if ($model === NULL)
            throw new HttpException(404, 'Document Does Not Exist');

        if (isset($_POST['Reader']))
        {
            $model->name = $_POST['Reader']['name'];

            if ($model->save())
            {
                Yii::$app->response->redirect(array('site/reader', 'id' => $model->id));
                return;
            }
        }

        echo $this->render('createreader', array(
            'model' => $model
        ));
    }
    
    public function actionDeletereader($id=NULL)
    {
        if ($id === NULL)
        {
            Yii::$app->session->setFlash('ReaderDeletedError');
            Yii::$app->getResponse()->redirect(array('site/reader'));
        }

        $reader = Reader::find()->where(['id' => $id])->one();

        if ($reader === NULL)
        {
            Yii::$app->session->setFlash('ReaderDeletedError');
            Yii::$app->getResponse()->redirect(array('site/reader'));
        }

        $reader->delete();

        Yii::$app->session->setFlash('ReaderDeleted');
        Yii::$app->getResponse()->redirect(array('site/reader'));
    }
    
    public function actionAuthor()
    {
        $author = new Author;
        $data = $author->find()->all();
    
        return $this->render('author', array(
            'data' => $data
        ));
    }
    
    public function actionCreateauthor()
    {
        $model = new Author;
        if (isset($_POST['Author']))
        {
            $model->name = $_POST['Author']['name'];

            if ($model->save())
            {
                Yii::$app->response->redirect(array('site/author', 'id' => $model->id));
                return;
            }
        }

        echo $this->render('createauthor', array(
            'model' => $model
        ));
    }
        
    public function actionUpdateauthor($id=NULL)
    {
        if ($id === NULL)
            throw new HttpException(404, 'Not Found');

        $model = Author::find()->where(['id' => $id])->one();

        if ($model === NULL)
            throw new HttpException(404, 'Document Does Not Exist');

        if (isset($_POST['Author']))
        {
            $model->name = $_POST['Author']['name'];

            if ($model->save())
            {
                Yii::$app->response->redirect(array('site/author', 'id' => $model->id));
                return;
            }
        }

        echo $this->render('createauthor', array(
            'model' => $model
        ));
    }
    
    public function actionDeleteauthor($id=NULL)
    {
        if ($id === NULL)
        {
            Yii::$app->session->setFlash('AuthorDeletedError');
            Yii::$app->getResponse()->redirect(array('site/author'));
        }

        $author = Author::find()->where(['id' => $id])->one();

        if ($author === NULL)
        {
            Yii::$app->session->setFlash('AuthorDeletedError');
            Yii::$app->getResponse()->redirect(array('site/author'));
        }

        $author->delete();

        Yii::$app->session->setFlash('AuthorDeleted');
        Yii::$app->getResponse()->redirect(array('site/author'));
    }
    
    public function actionReport()
    {
        return $this->render('report');
    }
    
    public function actionReportbookrandom()
    {
        $connection = \Yii::$app->db;

        $command=$connection->createCommand("SELECT * FROM book ORDER BY RAND( ) LIMIT 5");
        $command->execute();   
        
        $data = $command->query();
        
        $data = $data->readAll();
                
        return $this->render('reportbookrandom', array(
            'data' => $data
        ));
    }
    
    public function actionReporttest()
    {
        $book = new Book;
        $book->createTestData(10);
                
        $author = new Author;
        $author->createTestData(10);
        
        $reader = new Reader;
        $reader->createTestData(10);
        
              
        $book->createLink(30);
        
        Yii::$app->session->setFlash('BookReportTest');
        Yii::$app->getResponse()->redirect(array('site/report'));
    }
    
    public function actionReportbook()
    {
        $connection = \Yii::$app->db;

        $command=$connection->createCommand("SELECT a.id, a.name, c.cnt from (SELECT * , COUNT( * ) AS cnt FROM  `book_author`  GROUP BY book_id HAVING cnt > 2) AS c join" .
            "(SELECT DISTINCT(book_id) from book_reader) as b ON c.book_id = b.book_id join (select * from book) as a on a.id = b.book_id");
        $command->execute();   
        
        $data = $command->query();
        
        $data = $data->readAll();
                
        return $this->render('reportbook', array(
            'data' => $data
        ));
    }
    
    public function actionReportauthor()
    {
        $connection = \Yii::$app->db;

        $command=$connection->createCommand("SELECT DISTINCT(c.id), c.name from (SELECT * , COUNT( * ) AS cnt FROM  `book_reader` GROUP BY book_id HAVING cnt > 3) AS a join".
            "(SELECT DISTINCT(book_id), author_id from book_author) as b ON a.book_id = b.book_id join (select id, name from author) as c on c.id = b.author_id");
        $command->execute();   
        
        $data = $command->query();
        
        $data = $data->readAll();
                
        return $this->render('reportauthor', array(
            'data' => $data
        ));
    }
}
