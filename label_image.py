import tensorflow as tf, sys

image_path = sys.argv[1]

# Read in the image_data
image_data = tf.gfile.FastGFile(image_path, 'rb').read()

# Loads label file, strips off carriage return
label_lines = [line.rstrip() for line 
                   in tf.gfile.GFile("/tf_files/retrained_labels.txt")]

# Unpersists graph from file
with tf.gfile.FastGFile("/tf_files/retrained_graph.pb", 'rb') as f: 	#grab the model
    graph_def = tf.GraphDef()						#store it in graph_def variable
    graph_def.ParseFromString(f.read())					#parse the graph
    _ = tf.import_graph_def(graph_def, name='')

with tf.Session() as sess:						#create an environment to perform operations on tensor data
    # Feed the image_data as input to the graph and get first prediction
    softmax_tensor = sess.graph.get_tensor_by_name('final_result:0')
    
    predictions = sess.run(softmax_tensor, \
             {'DecodeJpeg/contents:0': image_data})
    
    # Sort to show labels of first prediction in order of confidence
    top_k = predictions[0].argsort()[-len(predictions[0]):][::-1]
    
    human_string = label_lines[top_k[0]]
        #score = predictions[0][node_id]
        #print('%s (score = %.5f)' % (human_string, score))
    print('%s' % (human_string))

    #for node_id in top_k:
     #   human_string = label_lines[node_id]
      #  score = predictions[0][node_id]
       # print('%s (score = %.5f)' % (human_string, score))
