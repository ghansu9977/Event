<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\Property;

class PropertyController extends Controller
{

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['http://localhost:5173'], // Allows requests from any origin
                    'Access-Control-Request-Method' => ['*'], // Allows all methods
                    'Access-Control-Request-Headers' => ['*'], // Allows all headers
                    'Access-Control-Allow-Credentials' => true,
                ],
            ],
            'contentNegotiator' => [
                'class' => \yii\filters\ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],  
        ];
    }


    public function actionAddProperty()
    {   
        $request = Yii::$app->request;

        $property = new Property();
        $property->attributes = $request->post();

        if ($property->validate() && $property->save()) {
            return "Save Successfully";
        } else {
            return "Internal Server Error";
        }
    }

    public function actionCreateProperty()
    {
        $request = Yii::$app->request;

        $property = new Property();
        $property->attributes = $request->post();

        $images = UploadedFile::getInstancesByName('images');
        $imagePaths = [];

        foreach ($images as $image) {
            $filePath = 'uploads/' . time() . '-' . $image->baseName . '.' . $image->extension;
            if ($image->saveAs($filePath)) {
                $imagePaths[] = $filePath;
            }
        }

        $property->images = json_encode($imagePaths);

        if ($property->save()) {
            return $this->asJson($property);
        } else {
            return $this->asJson(['msg' => 'Server error', 'errors' => $property->errors], 500);
        }
    }

    public function actionCreateMultipleProperties()
    {
        $request = Yii::$app->request;
        $propertiesData = $request->post('properties');

        $images = UploadedFile::getInstancesByName('images');
        $imagePaths = [];

        foreach ($images as $image) {
            $filePath = 'uploads/' . time() . '-' . $image->baseName . '.' . $image->extension;
            if ($image->saveAs($filePath)) {
                $imagePaths[] = $filePath;
            }
        }

        $newProperties = [];
        foreach ($propertiesData as $propertyData) {
            $property = new Property();
            $property->attributes = $propertyData;
            $property->images = json_encode(array_splice($imagePaths, 0, count($propertyData['images'])));
            
            if ($property->save()) {
                $newProperties[] = $property;
            } else {
                return $this->asJson(['msg' => 'Server error', 'errors' => $property->errors], 500);
            }
        }

        return $this->asJson($newProperties);
    }

    public function actionGetAllProperties()
    {
        $properties = Property::find()->all();
        return $this->asJson($properties);
    }

    public function actionSearchProperties()
    {
        $address = Yii::$app->request->get('address');
        $properties = Property::find()
            ->where(['like', 'address', $address])
            ->all();
        
        return $this->asJson($properties);
    }

    public function actionMarkAsFavorite()
    {
        $request = Yii::$app->request;
        $propertyId = $request->post('propertyId');
        $userId = $request->post('userId');

        $property = Property::findOne($propertyId);

        if (!$property) {
            return $this->asJson(['msg' => 'Property not found'], 404);
        }

        $favorites = json_decode($property->favorites, true);
        if (in_array($userId, $favorites)) {
            return $this->asJson(['msg' => 'Property already in favorites'], 400);
        }

        $favorites[] = $userId;
        $property->favorites = json_encode($favorites);
        $property->save();

        return $this->asJson($property);
    }

    public function actionGetFavorites()
    {
        $userId = Yii::$app->request->post('userId');
        $properties = Property::find()
            ->where(['like', 'favorites', $userId])
            ->all();

        return $this->asJson($properties);
    }

    public function actionUnmarkAsFavorite()
    {
        $request = Yii::$app->request;
        $propertyId = $request->post('propertyId');
        $userId = $request->post('userId');

        $property = Property::findOne($propertyId);

        if (!$property) {
            return $this->asJson(['msg' => 'Property not found'], 404);
        }

        $favorites = json_decode($property->favorites, true);
        if (($key = array_search($userId, $favorites)) !== false) {
            unset($favorites[$key]);
            $property->favorites = json_encode($favorites);
            $property->save();

            return $this->asJson($property);
        } else {
            return $this->asJson(['msg' => 'Property is not in favorites'], 400);
        }
    }

    public function actionViewPropertyOfParticularUser()
    {
        $userId = Yii::$app->request->post('userId');
        $properties = Property::find()->where(['user' => $userId])->all();

        if (empty($properties)) {
            return $this->asJson(['msg' => 'No properties found for this user'], 404);
        }

        return $this->asJson($properties);
    }

    public function actionUpdateProperty($id)
    {
        $property = Property::findOne($id);

        if (!$property) {
            return $this->asJson(['message' => 'Property not found'], 404);
        }

        $property->attributes = Yii::$app->request->post();

        if ($property->save()) {
            return $this->asJson($property);
        } else {
            return $this->asJson(['message' => 'Server error', 'errors' => $property->errors], 500);
        }
    }

    public function actionDeleteProperty($propertyId)
    {
        $property = Property::findOne($propertyId);

        if (!$property) {
            return $this->asJson(['message' => 'Property not found'], 404);
        }

        if ($property->delete()) {
            return $this->asJson(['message' => 'Property deleted successfully']);
        } else {
            return $this->asJson(['message' => 'Server error'], 500);
        }
    }
}
