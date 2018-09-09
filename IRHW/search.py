# -*- coding: utf-8 -*-
import csv
import os
import types;
import sys

path = "D:\\IRHW\\weight.csv"
f = open(path,'r')
weight = []
for row in csv.reader(f):
	weight.append(row)
f.close()

DATA_DIR = "D:\\ir_data"

filenames = []
for filename in os.listdir(DATA_DIR):
	ext = filename.split(".")
	if ext[1] == "wrd":
		continue
	if ext[0] == "words":
		continue
	filenames.append(filename)
print len(filenames)


index_terms = [] #讀words.txt取得563個關鍵字
loadWords = open(os.path.join(DATA_DIR, 'words.txt'), 'rb')
for line in open('D:\\ir_data\\words.txt'):
	row = loadWords.readline()
	tmp = row.split('\n')
	index_terms.append(tmp[0])
	#print tmp[0]

srch = raw_input("Search:")
index = srch.split(' ')
n_index = [] ##檢查後發現確實存在於index_term的所有字

for x in xrange(0,len(index_terms)):
	for i in xrange(0,len(index)):
		length = len(index_terms[x])-1
		fixedIndexTerm = index_terms[x][0:length]
		if index[i] == fixedIndexTerm:
			n_index.append(x)
			#print x+1

if len(n_index) == 0:
	print "Not found!!!"
else:
	rank = []
	for x in xrange(0,len(weight)):
		p = n_index[i]
		rankValue = 0
		rankLine = []
		for i in xrange(0,len(n_index)):		
			rankValue = weight[x][p]
		if float(rankValue) == 0:
			continue
		rankLine.append(x)
		rankLine.append(rankValue)
		rank.append(rankLine)
		
sortedRank = sorted(rank, key=lambda ranking : ranking[1], reverse = True)
for x in xrange(0,len(sortedRank)):
	filenameID = sortedRank[x][0]
	print str(x+1)+". "+filenames[filenameID]+"----tf*idf="+str(sortedRank[x][1])