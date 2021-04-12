import random
from random import randrange
import matplotlib.pylab as plt
from operator import itemgetter


dress_code = input("Enter the Dress code you want: ") # dress code
color = input("Enter the Color you want: ") # dark or bright
user_money = float(input("Enter the budget you have (as float): ")) # budget

generation_counter = 0 # counter to count number of generations
generation_size = 100 # size of the population
termination_c = 200 # termination condition
cross_over_rate = 0.99
mutation_rate = 0.01


def random_population():# array of arrays
    population = [["Top", "t-shirt", "dark", "casual", 0.0],
                  ["Top", "t-shirt", "bright", "casual", 0.0],
                  ["Top", "t-shirt", "dark", "sportswear", 0.0],
                  ["Top", "t-shirt", "bright", "sportswear", 0.0],
                  ["Top", "blouse", "bright", "business", 200.0],
                  ["Top", "blouse" , "bright", "evening", 200.0],
                  ["Top", "bodysuit", "dark", "evening", 150.0],
                  ["Top", "bodysuit", "dark", "casual", 150.0],
                  ["Top", "sleeveless", "dark", "casual", 110.0],
                  ["Top", "tank", "bright", "casual", 70.0],
                  ["Top", "tank", "bright", "sportswear", 70.0],
                  ["Top", "sweater", "dark", "casual", 200.0],
                  ["Top", "sweater", "dark", "business", 200.0],
                  ["Top", "vest" , "dark", "business", 300.0],
                  ["Top", "blazer", "dark", "business", 430.0],
                  ["Top", "jacket", "bright", "casual", 0.0],
                  ["Top", "hoodie", "bright", "sportswear", 230.0],
                  ["Top", "hoodie", "dark", "sportswear", 230.0],
                  ["Top", "cardigan", "bright", "casual", 300.0],

                  ["Bottom", "jeans", "dark", "casual", 150.0],
                  ["Bottom", "knee length pant", "bright", "casual", 220.0],
                  ["Bottom", "ankle length pant", "dark", "business", 0.0],
                  ["Bottom", "high waist pants", "bright", "business", 150.0],
                  ["Bottom", "legging", "dark", "casual", 100.0],
                  ["Bottom", "sweatpants", "bright", "casual", 100.0],
                  ["Bottom", "wide leg pants ", "dark", "business", 500.0],
                  ["Bottom", "wide leg pants ", "bright", "business", 500.0],
                  ["Bottom", "wide leg pants ", "bright", "evening ", 500.0],
                  ["Bottom", "wide leg pants ", "dark", "evening ", 500.0],
                  ["Bottom", "maxi skirt", "bright", "evening ", 500.0],
                  ["Bottom", "midi skirt", "dark", "business", 0.0],
                  ["Bottom", "short skirt", "bright", "casual", 400.0],

                  ["Shoes", "sandals" , "dark", "casual", 120.0],
                  ["Shoes", "sandals" , "dark", "evening", 120.0],
                  ["Shoes", "sneakers", "bright", "sportswear", 300.0],
                  ["Shoes", "sneakers", "bright", "casual", 300.0],
                  ["Shoes", "high heel", "dark", "evening" , 0.0],
                  ["Shoes", "mid heel", "bright", "casual", 400.0],
                  ["Shoes", "mid heel", "bright", "business", 400.0],
                  ["Shoes", "low heel", "dark", "business", 150.0],
                  ["Shoes", "flat", "bright", "casual", 0.0],
                  ["Shoes", "boots", "dark", "casual" , 500.0],

                  ["Neck", "necklace", "dark", "evening", 150.0],
                  ["Neck", "necklace", "dark", "business", 150.0],
                  ["Neck", "choker", "bright", "casual", 0.0],
                  ["Neck", "choker", "bright", "evening", 0.0],
                  ["Neck", "scarf", "bright", "casual", 250.0],
                  ["Neck", "tie", "dark", "business", 100.0],
                  ["Neck", "bow tie", "dark", "business", 100.0],

                  ["Handbag", "backpack", "dark", "sportswear", 100.0],
                  ["Handbag", "purse", "dark", "business", 600.0],
                  ["Handbag", "clutch", "bright", "evening", 500.0],
                  ["Handbag", "belt bag", "bright", "casual", 300.0],
                  ["Handbag", "cross bag", "bright", "business", 0.0]]

    init_population = [] # Initial population
    for i in range(0, generation_size):
        init_population.append([population[randrange(0, 19)], population[randrange(19, 32)]
                             , population[randrange(32, 42)], population[randrange(42, 49)]
                             , population[randrange(49, 54)]])
    return init_population



def fitness_function(outfit):
    fitness_value = 0 # wighted sum
    cost = 0.0
    for i in range(0, 5):
        if outfit[i][2] == color:
            fitness_value = fitness_value + 0.2
        if outfit[i][3] == dress_code:
            fitness_value = fitness_value + 0.4
        cost += outfit[i][4]
    fitness_value = fitness_value / 5
    if cost <= user_money :
        fitness_value = fitness_value + 0.4
    arr = [fitness_value, outfit]
    return arr


def roulette_wheel(popu):# (selection method)
    total_sum = 0
    for outfit in popu:
        total_sum = total_sum+ outfit[0]
    r = random.uniform(0, total_sum)
    partial_sum = 0
    for outfit in popu:
        partial_sum = partial_sum + outfit[0]
        if partial_sum >= r:
            return outfit[1]

def crossover(p1, p2):
    k = randrange(0, 5)
    for i in range(0, k):
        temp = p1[i]
        p1[i] = p2[i]
        p2[i] = temp
    return [p1, p2]


def mutation(i, j):
    k = randrange(0, 5)
    i1 = i[k]
    j1 = j[k]
    i[k] = j1
    j[k] = i1
    return [i, j]



def replacement(par, new):
    length = len(population)
    for i in range(0, length):
        if population[i] == par:
            population.remove(par)
            population.append(new)
            break



population = random_population() # initiate the first population

plot_array = [] # array of arrays [[generation number, average fitness values],[,]...]


for i in range(0, termination_c):

    out_and_value = [] # array of arrays [[outfit,fitness value],[,]...]
    for outfit in population:
        out_and_value.append(fitness_function(outfit))


    average=0
    for i in range(0, len(out_and_value)): # to calculate all the fitness values of population
        average = average + out_and_value[i][0]
    plot_array.append([generation_counter, average/len(out_and_value)])


    # choose two parents
    parent1 = roulette_wheel(out_and_value)
    parent2 = roulette_wheel(out_and_value)





    flag = True
    while flag: # to avoid redundant parents
        if parent1 == parent2:
            parent2 = roulette_wheel(out_and_value)
        else:
            flag = False



    cross_number = random.uniform(0, 1)  # random.uniform for generating random number with points
    if cross_number <= cross_over_rate:
        children = crossover(parent1.copy(), parent2.copy()) #send a copy to not affecting the real ones
        ch1 = children[0]
        ch2 = children[1]


        mutation_number = random.uniform(0, 1)
        if mutation_number <= mutation_rate:
            children = mutation(ch1.copy(), ch2.copy())
            ch1 = children[0]
            ch2 = children[1]

        # fitness function for each one
            parent1_v = fitness_function(parent1)
            parent2_v = fitness_function(parent2)
            ch1_v = fitness_function(ch1)
            ch2_v = fitness_function(ch2)

        # comparision
            all_outfits = [parent1_v, parent2_v, ch1_v, ch2_v]
            all_outfits_s = sorted(all_outfits, key=itemgetter(0)) # ascending order
            win1 = all_outfits_s[3][1]
            win2 = all_outfits_s[2][1]
            replacement(parent1.copy(), win1.copy())
            replacement(parent2.copy(), win2.copy())
            generation_counter = generation_counter + 1
        else:
        # fitness function for each one
            parent1_v = fitness_function(parent1)
            parent2_v = fitness_function(parent2)
            ch1_v = fitness_function(ch1)
            ch2_v = fitness_function(ch2)
        # comparision
            all_outfits = [parent1_v, parent2_v, ch1_v, ch2_v]
            all_outfits_s = sorted(all_outfits, key=itemgetter(0)) # ascending order
            win1 = all_outfits_s[3][1]
            win2 = all_outfits_s[2][1]
            replacement(parent1.copy(), win1.copy())
            replacement(parent2.copy(), win2.copy())
            generation_counter = generation_counter + 1
    else:
        mutation_number = random.uniform(0, 1)
        if mutation_number <= mutation_rate:
            children = mutation(parent1.copy(), parent2.copy())
            ch1 = children[0]
            ch2 = children[1]


            # fitness function for each one
            parent1_v = fitness_function(parent1)
            parent2_v = fitness_function(parent2)
            ch1_v = fitness_function(ch1)
            ch2_v = fitness_function(ch2)
            # comparision
            all_outfits = [parent1_v, parent2_v, ch1_v, ch2_v]
            all_outfits_s = sorted(all_outfits, key=itemgetter(0)) # ascending order
            win1 = all_outfits_s[3][1]
            win2 = all_outfits_s[2][1]
            replacement(parent1.copy(), win1.copy())
            replacement(parent2.copy(), win2.copy())
            generation_counter = generation_counter + 1

        else: # no crossover or mutation is performed
            generation_counter = generation_counter + 1

pop_outfits = sorted(out_and_value, key=itemgetter(0))
best_outfit = pop_outfits[len(pop_outfits)-1][1]
best_outfit_value = pop_outfits[len(pop_outfits)-1][0]

print("BEST OUTFIT:")
outfit_price = 0
for i in range(0, 5): # print best outfit
    outfit_price = outfit_price+best_outfit[i][4]
    print(best_outfit[i][1], " - ",best_outfit[i][2], " - ", best_outfit[i][3])

print("-----------------------------")
print("The cost of the outfit is :" , outfit_price)
print("-----------------------------")
print("The fitness value of the outfit is :",best_outfit_value)

testList2 = [(elem1, elem2) for elem1, elem2 in plot_array]
plt.plot(*zip(*testList2))
plt.show()

