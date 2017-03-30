# facial-expression-detection-from-images
To detect facial expression from images

>>> cd /usr/local/lib/python2.7/dist-packages/tensorflow/tensorflow/tensorflow/examples/image_retraining

#create classifier
>>> sudo python retrain.py \
--bottleneck_dir=/tf_files/bottlenecks \
--how_many_training_steps 4000 \
--model_dir=/tf_files/inception \
--output_graph=/tf_files/retrained_graph.pb \
--output_labels=/tf_files/retrained_labels.txt \
--image_dir /tf_files/image_photos

#testing:
 >>> python /home/hbg32/tf_files/label_image.py /home/hbg32/tf_files/testing_data/10.jpeg
 >>> python /home/hbg32/tf_files/label_image.py /home/hbg32/images/a.jpg

#webpage:
         http://localhost/index.php 
         on clicking result redirect to http://localhost/run.php



REFERENCES

tensorflow for poets:
        https://codelabs.developers.google.com/codelabs/tensorflow-for-poets/
  
lamp install:  
     	  https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-14-04

index.php
	      https://www.tutorialspoint.com/php/php_file_uploading.htm
