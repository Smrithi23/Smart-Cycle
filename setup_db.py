import mysql.connector
db = mysql.connector.connect(
    host="localhost",
    user="root",
    passwd="",
    database="SmartCycle"
)
print("Starting python script")

print("--------------------------------------------------")
print("Deletion :")
print("--------------------------------------------------")
cursor = db.cursor()
cursor.execute("DROP TABLE IF EXISTS Cycle_Usage")
print("Dropped Cycle_Usage table")
cursor.execute("DROP TABLE IF EXISTS User")
print("Dropped User table")
cursor.execute("DROP TABLE IF EXISTS Admin")
print("Dropped Admin table")
cursor.execute("DROP TABLE IF EXISTS Cycle")
print("Dropped Cycle table")
cursor.execute("DROP TABLE IF EXISTS Stand")
print("Dropped Stand table")
cursor.execute("DROP TABLE IF EXISTS Station")
print("Dropped Station table")
cursor.execute("DROP TRIGGER IF EXISTS Hash_Password_User")
print("Dropped Hash_Password_User Trigger")
cursor.execute("DROP TRIGGER IF EXISTS Hash_Password_Admin")
print("Dropped Hash_Password_Admin Trigger")

print("--------------------------------------------------")
print("Creation :")
print("--------------------------------------------------")
cursor.execute("CREATE TABLE Station (station_id INT AUTO_INCREMENT PRIMARY KEY, station_name VARCHAR(255) UNIQUE NOT NULL)")
print("Created Station Table")
cursor.execute("CREATE TABLE Stand (stand_id INT AUTO_INCREMENT PRIMARY KEY, stand_name VARCHAR(255) NOT NULL, station_id INT NOT NULL, no_of_cycles INT NOT NULL, FOREIGN KEY(station_id) REFERENCES Station(station_id))")
print("Created Stand Table")
cursor.execute("CREATE TABLE Cycle (cycle_number INT NOT NULL PRIMARY KEY, availability BOOL NOT NULL, stand_id INT NOT NULL, FOREIGN KEY(stand_id) REFERENCES Stand(stand_id))")
print("Created Cycle Table")
cursor.execute("CREATE TABLE User (user_id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255) NOT NULL UNIQUE, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(50) NOT NULL, password VARCHAR(255) NOT NULL, booked BOOL NOT NULL)")
print("Created User Table")
cursor.execute("CREATE TABLE Cycle_Usage (cycle_number INT NOT NULL, user_id INT NOT NULL, start_datetime DATETIME NOT NULL, card_no INT NOT NULL, exp_month INT NOT NULL, exp_year YEAR NOT NULL, cvv INT NOT NULL, FOREIGN KEY(cycle_number) REFERENCES Cycle(cycle_number))")
print("Created Cycle_Usage Table")
cursor.execute("CREATE TABLE Admin (admin_id INT AUTO_INCREMENT PRIMARY KEY, username VARCHAR(255) NOT NULL UNIQUE, password VARCHAR(255) NOT NULL)")
print("Created Admin")
cursor.execute("CREATE TRIGGER Hash_Password_User BEFORE INSERT ON User FOR EACH ROW BEGIN SET NEW.password = MD5(NEW.password); END")
print("Created Hash_Password_User")
cursor.execute("CREATE TRIGGER Hash_Password_Admin BEFORE INSERT ON Admin FOR EACH ROW BEGIN SET NEW.password = MD5(NEW.password); END")
print("Created Hash_Password_Admin")

print("--------------------------------------------------")
print("Insertion :")
print("--------------------------------------------------")
sql = "INSERT INTO Station (station_id, station_name) VALUES (%s, %s)"
val = [
    (1, 'AG – DMS'),
    (2, 'Anna Nagar East'),
    (3, 'Anna Nagar Tower'), 
    (4, 'Arignar Anna Alandur'),
    (5, 'Arumbakkam'),
    (6, 'Ashok Nagar'),
    (7, 'Chennai International Airport'),
    (8, 'Egmore'),
    (9, 'Ekkattuthangal'),
    (10, 'Government Estate'),
    (11, 'Guindy'),
    (12, 'High Court'), 
    (13, 'Kilpauk'),
    (14, 'Koyambedu'),
    (15, 'LIC'),
    (16, 'Little Mount'),
    (17, 'Mannadi'),
    (18, 'Meenambakkam'),
    (19, 'Nandanam'),
    (20, 'Nanganallur Road'),
    (21, 'Nehru Park'),
    (22, 'Pachaiyappa\'s College'),
    (23, 'Puratchi Thalaivar Dr. M.G. Ramachandran Central'),
    (24, 'Puratchi Thalaivi Dr. J. Jayalalithaa CMBT'),
    (25, 'Saidapet'),
    (26, 'Shenoy Nagar'),
    (27, 'St. Thomas Mount'),
    (28, 'Teynampet'),
    (29, 'Thirumangalam'),
    (30, 'Thousand Lights'),
    (31, 'Vadapalani'),
    (32, 'Washermanpet')
]

cursor.executemany(sql, val)
print(cursor.rowcount, "records were inserted into Station Table.")

sql = "INSERT INTO Stand (stand_id, stand_name, station_id, no_of_cycles) VALUES (%s, %s, %s, %s)"
val = [
    (1, 'A', 1, 5),
    (2, 'B', 1, 5),
    (3, 'C', 1, 5),
    (4, 'D', 1, 5),
    (5, 'A', 2, 5),
    (6, 'B', 2, 5),
    (7, 'C', 2, 5),
    (8, 'D', 2, 5),
    (9, 'A', 3, 5),
    (10, 'B', 3, 5),
    (11, 'C', 3, 5),
    (12, 'D', 3, 5),
    (13, 'A', 4, 5),
    (14, 'B', 4, 5),
    (15, 'C', 4, 5),
    (16, 'D', 4, 5),
    (17, 'A', 5, 5),
    (18, 'B', 5, 5),
    (19, 'C', 5, 5),
    (20, 'D', 5, 5),
    (21, 'A', 6, 5),
    (22, 'B', 6, 5),
    (23, 'C', 6, 5),
    (24, 'D', 6, 5),
    (25, 'A', 7, 5),
    (26, 'B', 7, 5),
    (27, 'C', 7, 5),
    (28, 'D', 7, 5),
    (29, 'A', 8, 5),
    (30, 'B', 8, 5),
    (31, 'C', 8, 5),
    (32, 'D', 8, 5),
    (33, 'A', 9, 5),
    (34, 'B', 9, 5),
    (35, 'C', 9, 5),
    (36, 'D', 9, 5),
    (37, 'A', 10, 5),
    (38, 'B', 10, 5),
    (39, 'C', 10, 5),
    (40, 'D', 10, 5),
    (41, 'A', 11, 5),
    (42, 'B', 11, 5),
    (43, 'C', 11, 5),
    (44, 'D', 11, 5),
    (45, 'A', 12, 5),
    (46, 'B', 12, 5),
    (47, 'C', 12, 5),
    (48, 'D', 12, 5),
    (49, 'A', 13, 5),
    (50, 'B', 13, 5),
    (51, 'C', 13, 5),
    (52, 'D', 13, 5),
    (53, 'A', 14, 5),
    (54, 'B', 14, 5),
    (55, 'C', 14, 5),
    (56, 'D', 14, 5),
    (57, 'A', 15, 5),
    (58, 'B', 15, 5),
    (59, 'C', 15, 5),
    (60, 'D', 15, 5),
    (61, 'A', 16, 5),
    (62, 'B', 16, 5),
    (63, 'C', 16, 5),
    (64, 'D', 16, 5),
    (65, 'A', 17, 5),
    (66, 'B', 17, 5),
    (67, 'C', 17, 5),
    (68, 'D', 17, 5),
    (69, 'A', 18, 5),
    (70, 'B', 18, 5),
    (71, 'C', 18, 5),
    (72, 'D', 18, 5),
    (73, 'A', 19, 5),
    (74, 'B', 19, 5),
    (75, 'C', 19, 5),
    (76, 'D', 19, 5),
    (77, 'A', 20, 5),
    (78, 'B', 20, 5),
    (79, 'C', 20, 5),
    (80, 'D', 20, 5),
    (81, 'A', 21, 5),
    (82, 'B', 21, 5),
    (83, 'C', 21, 5),
    (84, 'D', 21, 5),
    (85, 'A', 22, 5),
    (86, 'B', 22, 5),
    (87, 'C', 22, 5),
    (88, 'D', 22, 5),
    (89, 'A', 23, 5),
    (90, 'B', 23, 5),
    (91, 'C', 23, 5),
    (92, 'D', 23, 5),
    (93, 'A', 24, 5),
    (94, 'B', 24, 5),
    (95, 'C', 24, 5),
    (96, 'D', 24, 5),
    (97, 'A', 25, 5),
    (98, 'B', 25, 5),
    (99, 'C', 25, 5),
    (100, 'D', 25, 5),
    (101, 'A', 26, 5),
    (102, 'B', 26, 5),
    (103, 'C', 26, 5),
    (104, 'D', 26, 5),
    (105, 'A', 27, 5),
    (106, 'B', 27, 5),
    (107, 'C', 27, 5),
    (108, 'D', 27, 5),
    (109, 'A', 28, 5),
    (110, 'B', 28, 5),
    (111, 'C', 28, 5),
    (112, 'D', 28, 5),
    (113, 'A', 29, 5),
    (114, 'B', 29, 5),
    (115, 'C', 29, 5),
    (116, 'D', 29, 5),
    (117, 'A', 30, 5),
    (118, 'B', 30, 5),
    (119, 'C', 30, 5),
    (120, 'D', 30, 5),
    (121, 'A', 31, 5),
    (122, 'B', 31, 5),
    (123, 'C', 31, 5),
    (124, 'D', 31, 5),
    (125, 'A', 32, 5),
    (126, 'B', 32, 5),
    (127, 'C', 32, 5),
    (128, 'D', 32, 5),
]

cursor.executemany(sql, val)
print(cursor.rowcount, "records were inserted into Stand table.")

#I'm doing this table in seperate doc, I'll copy paste here.. so, u skip this
sql = "INSERT INTO Cycle (cycle_number, availability, stand_id) VALUES (%s, %s, %s)"
val = [
    (	2001,	True,	1),(	2002,	True,	2),(	2003,	True,	3),(	2004,	True,	4),(	2005,	True,	5),(	2006,	True,	6),(	2007,	True,	7),(	2008,	True,	8),(	2009,	True,	9),(	2010,	True,	10),(	2011,	True,	11),(	2012,	True,	12),(	2013,	True,	13),(	2014,	True,	14),(	2015,	True,	15),(	2016,	True,	16),(	2017,	True,	17),(	2018,	True,	18),(	2019,	True,	19),(	2020,	True,	20),(	2021,	True,	21),(	2022,	True,	22),(	2023,	True,	23),(	2024,	True,	24),(	2025,	True,	25),(	2026,	True,	26),(	2027,	True,	27),(	2028,	True,	28),(	2029,	True,	29),(	2030,	True,	30),(	2031,	True,	31),(	2032,	True,	32),(	2033,	True,	33),(	2034,	True,	34),(	2035,	True,	35),(	2036,	True,	36),(	2037,	True,	37),(	2038,	True,	38),(	2039,	True,	39),(	2040,	True,	40),(	2041,	True,	41),(	2042,	True,	42),(	2043,	True,	43),(	2044,	True,	44),(	2045,	True,	45),(	2046,	True,	46),(	2047,	True,	47),(	2048,	True,	48),(	2049,	True,	49),(	2050,	True,	50),(	2051,	True,	51),(	2052,	True,	52),(	2053,	True,	53),(	2054,	True,	54),(	2055,	True,	55),(	2056,	True,	56),(	2057,	True,	57),(	2058,	True,	58),(	2059,	True,	59),(	2060,	True,	60),(	2061,	True,	61),(	2062,	True,	62),(	2063,	True,	63),(	2064,	True,	64),(	2065,	True,	65),(	2066,	True,	66),(	2067,	True,	67),(	2068,	True,	68),(	2069,	True,	69),(	2070,	True,	70),(	2071,	True,	71),(	2072,	True,	72),(	2073,	True,	73),(	2074,	True,	74),(	2075,	True,	75),(	2076,	True,	76),(	2077,	True,	77),(	2078,	True,	78),(	2079,	True,	79),(	2080,	True,	80),(	2081,	True,	81),(	2082,	True,	82),(	2083,	True,	83),(	2084,	True,	84),(	2085,	True,	85),(	2086,	True,	86),(	2087,	True,	87),(	2088,	True,	88),(	2089,	True,	89),(	2090,	True,	90),(	2091,	True,	91),(	2092,	True,	92),(	2093,	True,	93),(	2094,	True,	94),(	2095,	True,	95),(	2096,	True,	96),(	2097,	True,	97),(	2098,	True,	98),(	2099,	True,	99),(	2100,	True,	100),(	2101,	True,	101),(	2102,	True,	102),(	2103,	True,	103),(	2104,	True,	104),(	2105,	True,	105),(	2106,	True,	106),(	2107,	True,	107),(	2108,	True,	108),(	2109,	True,	109),(	2110,	True,	110),(	2111,	True,	111),(	2112,	True,	112),(	2113,	True,	113),(	2114,	True,	114),(	2115,	True,	115),(	2116,	True,	116),(	2117,	True,	117),(	2118,	True,	118),(	2119,	True,	119),(	2120,	True,	120),(	2121,	True,	121),(	2122,	True,	122),(	2123,	True,	123),(	2124,	True,	124),(	2125,	True,	125),(	2126,	True,	126),(	2127,	True,	127),(	2128,	True,	128),(	2129,	True,	1),(	2130,	True,	2),(	2131,	True,	3),(	2132,	True,	4),(	2133,	True,	5),(	2134,	True,	6),(	2135,	True,	7),(	2136,	True,	8),(	2137,	True,	9),(	2138,	True,	10),(	2139,	True,	11),(	2140,	True,	12),(	2141,	True,	13),(	2142,	True,	14),(	2143,	True,	15),(	2144,	True,	16),(	2145,	True,	17),(	2146,	True,	18),(	2147,	True,	19),(	2148,	True,	20),(	2149,	True,	21),(	2150,	True,	22),(	2151,	True,	23),(	2152,	True,	24),(	2153,	True,	25),(	2154,	True,	26),(	2155,	True,	27),(	2156,	True,	28),(	2157,	True,	29),(	2158,	True,	30),(	2159,	True,	31),(	2160,	True,	32),(	2161,	True,	33),(	2162,	True,	34),(	2163,	True,	35),(	2164,	True,	36),(	2165,	True,	37),(	2166,	True,	38),(	2167,	True,	39),(	2168,	True,	40),(	2169,	True,	41),(	2170,	True,	42),(	2171,	True,	43),(	2172,	True,	44),(	2173,	True,	45),(	2174,	True,	46),(	2175,	True,	47),(	2176,	True,	48),(	2177,	True,	49),(	2178,	True,	50),(	2179,	True,	51),(	2180,	True,	52),(	2181,	True,	53),(	2182,	True,	54),(	2183,	True,	55),(	2184,	True,	56),(	2185,	True,	57),(	2186,	True,	58),(	2187,	True,	59),(	2188,	True,	60),(	2189,	True,	61),(	2190,	True,	62),(	2191,	True,	63),(	2192,	True,	64),(	2193,	True,	65),(	2194,	True,	66),(	2195,	True,	67),(	2196,	True,	68),(	2197,	True,	69),(	2198,	True,	70),(	2199,	True,	71),(	2200,	True,	72),(	2201,	True,	73),(	2202,	True,	74),(	2203,	True,	75),(	2204,	True,	76),(	2205,	True,	77),(	2206,	True,	78),(	2207,	True,	79),(	2208,	True,	80),(	2209,	True,	81),(	2210,	True,	82),(	2211,	True,	83),(	2212,	True,	84),(	2213,	True,	85),(	2214,	True,	86),(	2215,	True,	87),(	2216,	True,	88),(	2217,	True,	89),(	2218,	True,	90),(	2219,	True,	91),(	2220,	True,	92),(	2221,	True,	93),(	2222,	True,	94),(	2223,	True,	95),(	2224,	True,	96),(	2225,	True,	97),(	2226,	True,	98),(	2227,	True,	99),(	2228,	True,	100),(	2229,	True,	101),(	2230,	True,	102),(	2231,	True,	103),(	2232,	True,	104),(	2233,	True,	105),(	2234,	True,	106),(	2235,	True,	107),(	2236,	True,	108),(	2237,	True,	109),(	2238,	True,	110),(	2239,	True,	111),(	2240,	True,	112),(	2241,	True,	113),(	2242,	True,	114),(	2243,	True,	115),(	2244,	True,	116),(	2245,	True,	117),(	2246,	True,	118),(	2247,	True,	119),(	2248,	True,	120),(	2249,	True,	121),(	2250,	True,	122),(	2251,	True,	123),(	2252,	True,	124),(	2253,	True,	125),(	2254,	True,	126),(	2255,	True,	127),(	2256,	True,	128),(	2257,	True,	1),(	2258,	True,	2),(	2259,	True,	3),(	2260,	True,	4),(	2261,	True,	5),(	2262,	True,	6),(	2263,	True,	7),(	2264,	True,	8),(	2265,	True,	9),(	2266,	True,	10),(	2267,	True,	11),(	2268,	True,	12),(	2269,	True,	13),(	2270,	True,	14),(	2271,	True,	15),(	2272,	True,	16),(	2273,	True,	17),(	2274,	True,	18),(	2275,	True,	19),(	2276,	True,	20),(	2277,	True,	21),(	2278,	True,	22),(	2279,	True,	23),(	2280,	True,	24),(	2281,	True,	25),(	2282,	True,	26),(	2283,	True,	27),(	2284,	True,	28),(	2285,	True,	29),(	2286,	True,	30),(	2287,	True,	31),(	2288,	True,	32),(	2289,	True,	33),(	2290,	True,	34),(	2291,	True,	35),(	2292,	True,	36),(	2293,	True,	37),(	2294,	True,	38),(	2295,	True,	39),(	2296,	True,	40),(	2297,	True,	41),(	2298,	True,	42),(	2299,	True,	43),(	2300,	True,	44),(	2301,	True,	45),(	2302,	True,	46),(	2303,	True,	47),(	2304,	True,	48),(	2305,	True,	49),(	2306,	True,	50),(	2307,	True,	51),(	2308,	True,	52),(	2309,	True,	53),(	2310,	True,	54),(	2311,	True,	55),(	2312,	True,	56),(	2313,	True,	57),(	2314,	True,	58),(	2315,	True,	59),(	2316,	True,	60),(	2317,	True,	61),(	2318,	True,	62),(	2319,	True,	63),(	2320,	True,	64),(	2321,	True,	65),(	2322,	True,	66),(	2323,	True,	67),(	2324,	True,	68),(	2325,	True,	69),(	2326,	True,	70),(	2327,	True,	71),(	2328,	True,	72),(	2329,	True,	73),(	2330,	True,	74),(	2331,	True,	75),(	2332,	True,	76),(	2333,	True,	77),(	2334,	True,	78),(	2335,	True,	79),(	2336,	True,	80),(	2337,	True,	81),(	2338,	True,	82),(	2339,	True,	83),(	2340,	True,	84),(	2341,	True,	85),(	2342,	True,	86),(	2343,	True,	87),(	2344,	True,	88),(	2345,	True,	89),(	2346,	True,	90),(	2347,	True,	91),(	2348,	True,	92),(	2349,	True,	93),(	2350,	True,	94),(	2351,	True,	95),(	2352,	True,	96),(	2353,	True,	97),(	2354,	True,	98),(	2355,	True,	99),(	2356,	True,	100),(	2357,	True,	101),(	2358,	True,	102),(	2359,	True,	103),(	2360,	True,	104),(	2361,	True,	105),(	2362,	True,	106),(	2363,	True,	107),(	2364,	True,	108),(	2365,	True,	109),(	2366,	True,	110),(	2367,	True,	111),(	2368,	True,	112),(	2369,	True,	113),(	2370,	True,	114),(	2371,	True,	115),(	2372,	True,	116),(	2373,	True,	117),(	2374,	True,	118),(	2375,	True,	119),(	2376,	True,	120),(	2377,	True,	121),(	2378,	True,	122),(	2379,	True,	123),(	2380,	True,	124),(	2381,	True,	125),(	2382,	True,	126),(	2383,	True,	127),(	2384,	True,	128),(	2385,	True,	1),(	2386,	True,	2),(	2387,	True,	3),(	2388,	True,	4),(	2389,	True,	5),(	2390,	True,	6),(	2391,	True,	7),(	2392,	True,	8),(	2393,	True,	9),(	2394,	True,	10),(	2395,	True,	11),(	2396,	True,	12),(	2397,	True,	13),(	2398,	True,	14),(	2399,	True,	15),(	2400,	True,	16),(	2401,	True,	17),(	2402,	True,	18),(	2403,	True,	19),(	2404,	True,	20),(	2405,	True,	21),(	2406,	True,	22),(	2407,	True,	23),(	2408,	True,	24),(	2409,	True,	25),(	2410,	True,	26),(	2411,	True,	27),(	2412,	True,	28),(	2413,	True,	29),(	2414,	True,	30),(	2415,	True,	31),(	2416,	True,	32),(	2417,	True,	33),(	2418,	True,	34),(	2419,	True,	35),(	2420,	True,	36),(	2421,	True,	37),(	2422,	True,	38),(	2423,	True,	39),(	2424,	True,	40),(	2425,	True,	41),(	2426,	True,	42),(	2427,	True,	43),(	2428,	True,	44),(	2429,	True,	45),(	2430,	True,	46),(	2431,	True,	47),(	2432,	True,	48),(	2433,	True,	49),(	2434,	True,	50),(	2435,	True,	51),(	2436,	True,	52),(	2437,	True,	53),(	2438,	True,	54),(	2439,	True,	55),(	2440,	True,	56),(	2441,	True,	57),(	2442,	True,	58),(	2443,	True,	59),(	2444,	True,	60),(	2445,	True,	61),(	2446,	True,	62),(	2447,	True,	63),(	2448,	True,	64),(	2449,	True,	65),(	2450,	True,	66),(	2451,	True,	67),(	2452,	True,	68),(	2453,	True,	69),(	2454,	True,	70),(	2455,	True,	71),(	2456,	True,	72),(	2457,	True,	73),(	2458,	True,	74),(	2459,	True,	75),(	2460,	True,	76),(	2461,	True,	77),(	2462,	True,	78),(	2463,	True,	79),(	2464,	True,	80),(	2465,	True,	81),(	2466,	True,	82),(	2467,	True,	83),(	2468,	True,	84),(	2469,	True,	85),(	2470,	True,	86),(	2471,	True,	87),(	2472,	True,	88),(	2473,	True,	89),(	2474,	True,	90),(	2475,	True,	91),(	2476,	True,	92),(	2477,	True,	93),(	2478,	True,	94),(	2479,	True,	95),(	2480,	True,	96),(	2481,	True,	97),(	2482,	True,	98),(	2483,	True,	99),(	2484,	True,	100),(	2485,	True,	101),(	2486,	True,	102),(	2487,	True,	103),(	2488,	True,	104),(	2489,	True,	105),(	2490,	True,	106),(	2491,	True,	107),(	2492,	True,	108),(	2493,	True,	109),(	2494,	True,	110),(	2495,	True,	111),(	2496,	True,	112),(	2497,	True,	113),(	2498,	True,	114),(	2499,	True,	115),(	2500,	True,	116),(	2501,	True,	117),(	2502,	True,	118),(	2503,	True,	119),(	2504,	True,	120),(	2505,	True,	121),(	2506,	True,	122),(	2507,	True,	123),(	2508,	True,	124),(	2509,	True,	125),(	2510,	True,	126),(	2511,	True,	127),(	2512,	True,	128),(	2513,	True,	1),(	2514,	True,	2),(	2515,	True,	3),(	2516,	True,	4),(	2517,	True,	5),(	2518,	True,	6),(	2519,	True,	7),(	2520,	True,	8),(	2521,	True,	9),(	2522,	True,	10),(	2523,	True,	11),(	2524,	True,	12),(	2525,	True,	13),(	2526,	True,	14),(	2527,	True,	15),(	2528,	True,	16),(	2529,	True,	17),(	2530,	True,	18),(	2531,	True,	19),(	2532,	True,	20),(	2533,	True,	21),(	2534,	True,	22),(	2535,	True,	23),(	2536,	True,	24),(	2537,	True,	25),(	2538,	True,	26),(	2539,	True,	27),(	2540,	True,	28),(	2541,	True,	29),(	2542,	True,	30),(	2543,	True,	31),(	2544,	True,	32),(	2545,	True,	33),(	2546,	True,	34),(	2547,	True,	35),(	2548,	True,	36),(	2549,	True,	37),(	2550,	True,	38),(	2551,	True,	39),(	2552,	True,	40),(	2553,	True,	41),(	2554,	True,	42),(	2555,	True,	43),(	2556,	True,	44),(	2557,	True,	45),(	2558,	True,	46),(	2559,	True,	47),(	2560,	True,	48),(	2561,	True,	49),(	2562,	True,	50),(	2563,	True,	51),(	2564,	True,	52),(	2565,	True,	53),(	2566,	True,	54),(	2567,	True,	55),(	2568,	True,	56),(	2569,	True,	57),(	2570,	True,	58),(	2571,	True,	59),(	2572,	True,	60),(	2573,	True,	61),(	2574,	True,	62),(	2575,	True,	63),(	2576,	True,	64),(	2577,	True,	65),(	2578,	True,	66),(	2579,	True,	67),(	2580,	True,	68),(	2581,	True,	69),(	2582,	True,	70),(	2583,	True,	71),(	2584,	True,	72),(	2585,	True,	73),(	2586,	True,	74),(	2587,	True,	75),(	2588,	True,	76),(	2589,	True,	77),(	2590,	True,	78),(	2591,	True,	79),(	2592,	True,	80),(	2593,	True,	81),(	2594,	True,	82),(	2595,	True,	83),(	2596,	True,	84),(	2597,	True,	85),(	2598,	True,	86),(	2599,	True,	87),(	2600,	True,	88),(	2601,	True,	89),(	2602,	True,	90),(	2603,	True,	91),(	2604,	True,	92),(	2605,	True,	93),(	2606,	True,	94),(	2607,	True,	95),(	2608,	True,	96),(	2609,	True,	97),(	2610,	True,	98),(	2611,	True,	99),(	2612,	True,	100),(	2613,	True,	101),(	2614,	True,	102),(	2615,	True,	103),(	2616,	True,	104),(	2617,	True,	105),(	2618,	True,	106),(	2619,	True,	107),(	2620,	True,	108),(	2621,	True,	109),(	2622,	True,	110),(	2623,	True,	111),(	2624,	True,	112),(	2625,	True,	113),(	2626,	True,	114),(	2627,	True,	115),(	2628,	True,	116),(	2629,	True,	117),(	2630,	True,	118),(	2631,	True,	119),(	2632,	True,	120),(	2633,	True,	121),(	2634,	True,	122),(	2635,	True,	123),(	2636,	True,	124),(	2637,	True,	125),(	2638,	True,	126),(	2639,	True,	127),(	2640,	True,	128)
]

cursor.executemany(sql, val)
print(cursor.rowcount, "records were inserted into Cycle table.")

sql = "INSERT INTO User (user_id, username, first_name, last_name, phone_number, password, booked) VALUES (%s, %s, %s, %s, %s, %s, %s)"
val = [
    (1, 'akshara', 'Akshara', 'P S', '7330921893', 'akshara05', 0),
    (2, 'paavai', 'Painthamizh', 'Paavai', '7991023874', 'paavai69', 0),
    (3, 'smrithi', 'Smrithi', 'Prakash', '7552893678', 'smrithi89', 0)
]

cursor.executemany(sql, val)
print(cursor.rowcount, "records were inserted into User table.")

sql = "INSERT INTO Admin (admin_id, username, password) VALUES (%s, %s, %s)"
val = [
    (1, 'admin', 'password'),
]

cursor.executemany(sql, val)
print(cursor.rowcount, "record was inserted into Admin table.")

db.commit()