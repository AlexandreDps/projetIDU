#!C:\Users\Prichici\AppData\Local\Programs\Python\Python310\python.exe
from pymongo import MongoClient
import matplotlib.pyplot as plt
import plotly.graph_objects as go

#Initialisation
client = MongoClient()
client = MongoClient('localhost', 27017)
db = client['StudentApp']


def polypointsPie():
    data = list(db.get_collection('polypoints').find({}))
    data = data[0]
    
    d = data['nb_points']
    print(d)
    sum = 0
    for i in d : 
        j = int(i)
        sum+= j

    if sum <3 :
        poly_colors = ['crimson', 'darkgrey']

    if sum <6 :
        poly_colors = ['gold', 'darkgrey']

    if sum >=6:
        poly_colors = ['lawngreen', 'darkgrey']

    if sum<9:
        labels = ['polypoints','remaining']
        values = [sum,9-sum]



    if sum>9:
        poly_colors = ['lawngreen']
        labels = ['polypoints']
        values = [sum]

    if sum<9:
        title='You still have to earn '+str(9-sum)+' points'
    else:
        title='Congrats! You have all the points you needed'
    fig = go.Figure(data=[go.Pie(labels=labels, values=values, hole=.5, title = title)])
    fig.update_traces(textinfo='value', marker=dict(colors=poly_colors, line=dict(color='#000000', width=2), ))
    fig.update(layout_showlegend=False)
    return fig

fig = polypointsPie()
fig.write_image("images/fig1.png")


data = list(db.get_collection('courses_marks').find({}))
data = data[0]
av=0
nonav=0
for key, value in data.items():
    if key == '_id' or key == 'user':
        continue
    if value.strip() == '-' or value.strip() == '':
        nonav+=1
    else:
        av+=1

plt.figure()
sizes = [av, nonav]  # Replace with your data values
labels = ['Available', 'Not graded']  # Replace with your labels

# Create the pie chart
plt.pie(sizes, labels=labels, autopct='%1.1f%%')

# Set aspect ratio to be equal so that pie is drawn as a circle
plt.axis('equal')

# Add a title
plt.title('Pie Chart for the available grades')

# Display the chart
plt.savefig('images/pie_availability.png')
#plt.show()

data = list(db.get_collection('marks_intranet').find({}))
data=data[0]
for key, value in data.items():
    print(key, value)

plt.figure()
plt.boxplot(data['notes'])
plt.savefig('images/boxplot.png')

plt.figure()
plt.hist(data['notes'], edgecolor='black')

# Add labels and title
plt.xlabel('Value')
plt.ylabel('Frequency')
plt.title('Grades')

# Display the chart
plt.savefig('images/hist.png')




