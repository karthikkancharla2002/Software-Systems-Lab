import sys
import numpy as np
import random
import matplotlib.pyplot as plt

def randGen():
    file1 = open("dataset.txt","w")
    for _ in range(10000):
        age = random.randint(1,100)
        gender = random.choice(["Male","Female"])
        states = ["Andhra Pradesh","Arunachal Pradesh ","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Tripura","Uttar Pradesh","Uttarakhand","West Bengal"]
        state = random.choice(states)
        phno = random.choice(['6','7','8','9'])
        for _ in range(9):
            phno+= str(random.randint(0,9))
        height = random.gauss(160,10)
        weight = random.gauss(70,5)
        print(f"{age}, {gender}, {state}, {phno}, {round(height,2)}cm, {round(weight,2)}kg",file=file1)
    file1.close()

class Person:
    def __init__(self,age,gender,state,phno,height,weight):
        self.age = age
        self.gender = gender
        self.state = state
        self.phno = phno
        self.height = height
        self.weight = weight

if __name__ == "__main__":

    #Calling the function to generate dataset
    randGen()
    persons = []

    #reading data from dataset and appending into a list
    file2 = open("dataset.txt","r")
    for i in range(10000):
        line1 = file2.readline().split(", ")
        persons.append(Person(float(line1[0]),line1[1],line1[2],(line1[3]),float(line1[4][:-2]),float(line1[5][:-3])))
    file2.close()

    #printing average height and weight of the dataset and appending to it
    avgh = 0
    avgw = 0
    file3 = open("dataset.txt","a")
    for i in range(10000):
        avgh+= persons[i].height
        avgw+= persons[i].weight
    avgh = avgh/10000
    avgw = avgw/10000
    print(round(avgh,3),file=file3)
    print(round(avgw,3),end="",file=file3)

    #creating lists and using them for storing specific values for plotting graphs
    heightsmale = []
    heightsfemale = []
    weightsmale = []
    weightsfemale = []
    gendersmale = 0
    gendersfemale = 0
    phonenums = [0,0,0,0]
    statecount = [0 for i in range(28)]
    states = ["Andhra Pradesh","Arunachal Pradesh ","Assam","Bihar","Chhattisgarh","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Odisha","Punjab","Rajasthan","Sikkim","Tamil Nadu","Tripura","Uttar Pradesh","Uttarakhand","West Bengal"]
    maleages = []
    femaleages = []
    for i in range(10000):
        if persons[i].gender == "Male":
            heightsmale.append(persons[i].height)
            weightsmale.append(persons[i].weight)
            gendersmale+=1
            maleages.append(persons[i].age)
        if persons[i].gender == "Female":
            heightsfemale.append(persons[i].height)
            weightsfemale.append(persons[i].weight)
            gendersfemale+=1
            femaleages.append(persons[i].age)
        if persons[i].phno[0] == "6":
            phonenums[0]+=1
        if persons[i].phno[0] == "7":
            phonenums[1]+=1
        if persons[i].phno[0] == "8":
            phonenums[2]+=1
        if persons[i].phno[0] == "9":
            phonenums[3]+=1
        for j in range(len(states)):
            if persons[i].state == states[j]:
                statecount[j]+=1

    maleages.sort()
    femaleages.sort()
    maleages2 = [0 for i in range(len(maleages))]
    femaleages2 = [0 for i in range(len(femaleages))]

    for i in range(1,len(maleages)):
        maleages2[i]+=maleages2[i-1]+1
    for i in range(1,len(femaleages)):
        femaleages2[i]+=femaleages2[i-1]+1

    #Plotting heights
    plt.subplot(1,2,1)
    plt.hist(heightsmale)
    plt.title("Male Heights")
    plt.subplot(1,2,2)
    plt.hist(heightsfemale)
    plt.title("Female Heights")
    plt.suptitle("Histogram of Male and Female Heights")
    plt.savefig("height.jpg")
    plt.close()
      

    #Plotting weights
    plt.subplot(1,2,1)
    plt.hist(weightsmale)
    plt.title("Male Weights")
    plt.subplot(1,2,2)
    plt.hist(weightsfemale)
    plt.title("Female Weights")
    plt.suptitle("Histogram of Male and Female Weights")
    plt.savefig("weight.jpg")
    plt.close()


    #Plotting genders
    genderspie = []
    genderspie.append(gendersmale)
    genderspie.append(gendersfemale)
    mylabels = ["Male","Female"]
    fig2 = plt.pie(genderspie,labels = mylabels)
    plt.title("Pie chart of Male and Female Genders")
    plt.savefig("gender.jpg")
    plt.close()


    #Plotting phone numbers
    myphlabels = ["6","7","8","9"]
    fig3 = plt.pie(phonenums,labels= myphlabels)
    plt.title("Phone numbers staring with different digits")
    plt.legend(title = "Starting with:",loc = "lower right")
    plt.savefig("phone.jpg")
    plt.close()


    #Plotting ages
    plt.plot(maleages,maleages2,label="Male")
    plt.plot(femaleages,femaleages2,color = "y",label="Female")
    plt.title("Line plots of Cumulative Distribution function of Male and Female ages")
    plt.legend(loc = "lower right")
    plt.savefig("age.jpg")
    plt.close()


    #Plotting states and their population
    plt.bar(states,statecount)
    plt.xticks(rotation = 90)
    plt.title("States and number of people in those states")
    plt.tight_layout()
    plt.savefig("state.jpg")
    plt.close()
    

