using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BubbleSort
{
    class Program
    {
        static void Main(string[] args)
        {
            Bubble();
            Console.ReadLine();
        }
        public static void Bubble()
        {
            int[] array = new int[]{2, 5, 1, 4, 3};
            
            for (int i = 0; i < array.Length-1; i++)
            {
                for (int j = i+1; j < array.Length; j++)
                {
                    if (array[i] > array[j])
                    {
                        int temp = 0;
                        temp = array[i];
                        array[i] = array[j];
                        array[j] = temp;   
                    }
                }
            }

            foreach (int a in array)
            {
                Console.Write(a + " ");
            }

        }
    }

    
}
